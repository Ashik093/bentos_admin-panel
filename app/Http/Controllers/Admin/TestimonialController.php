<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class TestimonialController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }
    /**
     * Display a listing of all testimonials
     */
    public function index()
    {
        $data = Testimonial::all();
        return view('admin.testimonial.index', compact('data'));
    }

    /**
     * Show the form for creating a new testimonial
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }
    /**
     * Store a newly created testimonial in database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_position' => 'nullable|string|max:255',
            'message' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        $testimonial = new Testimonial();
        $testimonial->client_name = $validated['client_name'];
        $testimonial->client_position = $validated['client_position'] ?? null;
        $testimonial->message = $validated['message'];

        // handle client photo
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = 'testimonial_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/testimonial_photos');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            Image::make($image)->fit(90, 90, function ($constraint) {
                $constraint->upsize();
            })->save($destinationPath . DIRECTORY_SEPARATOR . $imageName);
            $testimonial->photo = 'uploads/testimonial_photos/' . $imageName;
        }

        if ($testimonial->save()) {
            $notification = array(
                'messege' => 'Testimonial Added Successfully',
                'type' => 'success'
            );
            return redirect()->route('testimonial.index')->with($notification);
        }

        $notification = array(
            'messege' => 'Failed to add testimonial',
            'type' => 'error'
        );
        return redirect()->back()->withInput()->with($notification);
    }
    /**
     * Show the form for editing the specified testimonial
     */
    public function edit($id)
    {
        $data = Testimonial::findOrFail($id);
        return view('admin.testimonial.edit', compact('data'));
    }
    /**
     * Update the specified testimonial in database
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_position' => 'nullable|string|max:255',
            'message' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        $testimonial = Testimonial::findOrFail($id);
        $testimonial->client_name = $validated['client_name'];
        $testimonial->client_position = $validated['client_position'] ?? null;
        $testimonial->message = $validated['message'];

        // handle photo replacement
        if ($request->hasFile('photo')) {
            // remove old if exists
            if ($testimonial->photo && File::exists(public_path($testimonial->photo))) {
                @unlink(public_path($testimonial->photo));
            }
            $image = $request->file('photo');
            $imageName = 'testimonial_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/testimonial_photos');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            Image::make($image)->fit(90, 90, function ($constraint) {
                $constraint->upsize();
            })->save($destinationPath . DIRECTORY_SEPARATOR . $imageName);
            $testimonial->photo = 'uploads/testimonial_photos/' . $imageName;
        }

        if ($testimonial->save()) {
            $notification = array(
                'messege' => 'Testimonial Updated Successfully',
                'type' => 'success'
            );
            return redirect()->route('testimonial.index')->with($notification);
        }

        $notification = array(
            'messege' => 'Failed to update testimonial',
            'type' => 'error'
        );
        return redirect()->back()->withInput()->with($notification);
    }
    /**
     * Delete the specified testimonial from database
     */
    public function delete($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        // delete photo if present
        if ($testimonial->photo && File::exists(public_path($testimonial->photo))) {
            @unlink(public_path($testimonial->photo));
        }

        if ($testimonial->delete()) {
            $notification = array(
                'messege' => 'Testimonial Deleted Successfully',
                'type' => 'success'
            );
            return redirect()->route('testimonial.index')->with($notification);
        }

        $notification = array(
            'messege' => 'Failed to delete testimonial',
            'type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
