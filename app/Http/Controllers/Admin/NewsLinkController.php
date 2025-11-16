<?php

namespace App\Http\Controllers\Admin;

use App\Models\NewsLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class NewsLinkController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }
    public function index()
    {
        $data = NewsLink::get();
        return view('admin.newslink.index',compact('data'));
    }
    public function create()
    {

        return view('admin.newslink.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'required|url|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'newspaper_name' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
        ]);

        $newslink = new NewsLink();
        $newslink->title = $validated['title'];
        $newslink->link = $validated['link'];
        $newslink->newspaper_name = $validated['newspaper_name'] ?? null;
        $newslink->published_at = $validated['published_at'] ?? null;

        // handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = 'newslink_' . time() . '_' . uniqid() . '.' . $thumbnail->getClientOriginalExtension();
            $destinationPath = public_path('uploads/newslink_thumbnails');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            // resize to reasonable dimensions
            Image::make($thumbnail)->fit(1400, 788, function ($constraint) {
                $constraint->upsize();
            })->save($destinationPath . DIRECTORY_SEPARATOR . $thumbnailName, 80);
            $newslink->thumbnail = 'uploads/newslink_thumbnails/' . $thumbnailName;
        }

        if ($newslink->save()) {
            $notification = array(
                'messege' => 'News Link Saved',
                'type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }

        $notification = array(
            'messege' => 'Unsuccessful',
            'type' => 'error'
        );

        return Redirect()->back()->with($notification);
    }
    public function edit($id)
    {
        $data = NewsLink::findOrFail($id);
        return view('admin.newslink.edit', compact('data'));
    }
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'required|url|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'newspaper_name' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
        ]);

        $newslink = NewsLink::findOrFail($id);
        $newslink->title = $validated['title'];
        $newslink->link = $validated['link'];
        $newslink->newspaper_name = $validated['newspaper_name'] ?? null;
        $newslink->published_at = $validated['published_at'] ?? null;

        // handle thumbnail replacement
        if ($request->hasFile('thumbnail')) {
            if ($newslink->thumbnail && File::exists(public_path($newslink->thumbnail))) {
                @unlink(public_path($newslink->thumbnail));
            }
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = 'newslink_' . time() . '_' . uniqid() . '.' . $thumbnail->getClientOriginalExtension();
            $destinationPath = public_path('uploads/newslink_thumbnails');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            Image::make($thumbnail)->fit(1400, 788, function ($constraint) {
                $constraint->upsize();
            })->save($destinationPath . DIRECTORY_SEPARATOR . $thumbnailName, 80);
            $newslink->thumbnail = 'uploads/newslink_thumbnails/' . $thumbnailName;
        }

        if ($newslink->save()) {
            $notification = array(
                'messege' => 'News Link Updated',
                'type' => 'success'
            );

            return Redirect()->back()->with($notification);
        }

        $notification = array(
            'messege' => 'Unsuccessful',
            'type' => 'error'
        );

        return Redirect()->back()->with($notification);
    }
    public function delete($id)
    {
        $newslink = NewsLink::findOrFail($id);
        // delete thumbnail if present
        if ($newslink->thumbnail && File::exists(public_path($newslink->thumbnail))) {
            @unlink(public_path($newslink->thumbnail));
        }

        if ($newslink->delete()) {
            $notification = array(
                'messege' => 'News Link Deleted',
                'type' => 'success'
            );

            return Redirect()->back()->with($notification);
        }

        $notification = array(
            'messege' => 'Unsuccessful',
            'type' => 'error'
        );

        return Redirect()->back()->with($notification);

    }
}
