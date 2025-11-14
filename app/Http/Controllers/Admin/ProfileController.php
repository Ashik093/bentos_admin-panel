<?php

namespace App\Http\Controllers\Admin;

use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }
    public function index()
    {
        $data = Profile::get();
        return view('admin.portfolioprofile.index',compact('data'));
    }
    public function create()
    {
       
        return view('admin.portfolioprofile.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'long_description' => 'nullable|string',
            'bio' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'available_for_freelance' => 'nullable|boolean',
            'cv_file' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'facebook_link' => 'nullable|url',
            'x_link' => 'nullable|url',
            'linked_link' => 'nullable|url',
            'github_link' => 'nullable|url',
        ]);

        $profile = new Profile();
        $profile->name = $validated['name'];
        $profile->role = $validated['role'] ?? null;
        $profile->short_description = $validated['short_description'] ?? null;
        $profile->long_description = $validated['long_description'] ?? null;
        $profile->bio = $validated['bio'] ?? null;
        $profile->location = $validated['location'] ?? null;
        $profile->available_for_freelance = $request->boolean('available_for_freelance');
        $profile->facebook_link = $validated['facebook_link'] ?? null;
        $profile->x_link = $validated['x_link'] ?? null;
        $profile->linked_link = $validated['linked_link'] ?? null;
        $profile->github_link = $validated['github_link'] ?? null;

        // handle profile photo
        if ($request->hasFile('profile_photo')) {
            $image = $request->file('profile_photo');
            $imageName = 'profile_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/profile_photos');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            Image::make($image)->fit(732, 979, function ($constraint) {
                $constraint->upsize();
            })->save($destinationPath . DIRECTORY_SEPARATOR . $imageName, 80);
            $profile->profile_photo = 'uploads/profile_photos/' . $imageName;
        }

        // handle CV file
        if ($request->hasFile('cv_file')) {
            $cv = $request->file('cv_file');
            $cvName = 'cv_' . time() . '_' . uniqid() . '.' . $cv->getClientOriginalExtension();
            $cvPath = public_path('uploads/cv_files');
            if (!File::exists($cvPath)) {
                File::makeDirectory($cvPath, 0755, true);
            }
            $cv->move($cvPath, $cvName);
            $profile->cv_file = 'uploads/cv_files/' . $cvName;
        }

        if ($profile->save()) {
            $notification = array(
                'messege' => 'Profile Saved',
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
        $data = Profile::findOrFail($id);
        return view('admin.portfolioprofile.edit', compact('data'));
    }
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'long_description' => 'nullable|string',
            'bio' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'available_for_freelance' => 'nullable|boolean',
            'cv_file' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'facebook_link' => 'nullable|url',
            'x_link' => 'nullable|url',
            'linked_link' => 'nullable|url',
            'github_link' => 'nullable|url',
        ]);

        $profile = Profile::findOrFail($id);
        $profile->name = $validated['name'];
        $profile->role = $validated['role'] ?? null;
        $profile->short_description = $validated['short_description'] ?? null;
        $profile->long_description = $validated['long_description'] ?? null;
        $profile->bio = $validated['bio'] ?? null;
        $profile->location = $validated['location'] ?? null;
        $profile->available_for_freelance = $request->boolean('available_for_freelance');
        $profile->facebook_link = $validated['facebook_link'] ?? null;
        $profile->x_link = $validated['x_link'] ?? null;
        $profile->linked_link = $validated['linked_link'] ?? null;
        $profile->github_link = $validated['github_link'] ?? null;

        // handle profile photo replacement
        if ($request->hasFile('profile_photo')) {
            // remove old if exists
            if ($profile->profile_photo && File::exists(public_path($profile->profile_photo))) {
                @unlink(public_path($profile->profile_photo));
            }
            $image = $request->file('profile_photo');
            $imageName = 'profile_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/profile_photos');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            Image::make($image)->fit(732, 979, function ($constraint) {
                $constraint->upsize();
            })->save($destinationPath . DIRECTORY_SEPARATOR . $imageName, 80);
            $profile->profile_photo = 'uploads/profile_photos/' . $imageName;
        }

        // handle CV file replacement
        if ($request->hasFile('cv_file')) {
            if ($profile->cv_file && File::exists(public_path($profile->cv_file))) {
                @unlink(public_path($profile->cv_file));
            }
            $cv = $request->file('cv_file');
            $cvName = 'cv_' . time() . '_' . uniqid() . '.' . $cv->getClientOriginalExtension();
            $cvPath = public_path('uploads/cv_files');
            if (!File::exists($cvPath)) {
                File::makeDirectory($cvPath, 0755, true);
            }
            $cv->move($cvPath, $cvName);
            $profile->cv_file = 'uploads/cv_files/' . $cvName;
        }

        if ($profile->save()) {
            $notification = array(
                'messege' => 'Profile Updated',
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
        $profile = Profile::findOrFail($id);
        // delete files if present
        if ($profile->profile_photo && File::exists(public_path($profile->profile_photo))) {
            @unlink(public_path($profile->profile_photo));
        }
        if ($profile->cv_file && File::exists(public_path($profile->cv_file))) {
            @unlink(public_path($profile->cv_file));
        }

        if ($profile->delete()) {
            $notification = array(
                'messege' => 'Profile Deleted',
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
