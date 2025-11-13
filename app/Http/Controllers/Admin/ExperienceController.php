<?php

namespace App\Http\Controllers\Admin;

use App\Models\Experience;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExperienceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of all experiences
     */
    public function index()
    {
        $data = Experience::orderBy('start_year', 'desc')->get();
        return view('admin.experience.index', compact('data'));
    }

    /**
     * Show the form for creating a new experience
     */
    public function create()
    {
        return view('admin.experience.create');
    }

    /**
     * Store a newly created experience in database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'start_year' => 'required|integer|digits:4',
            'end_year' => 'nullable|integer|digits:4|gte:start_year',
            'is_current' => 'nullable|boolean',
            'description' => 'nullable|string',
        ]);

        // If is_current is true, set end_year to null
        if ($validated['is_current'] ?? false) {
            $validated['end_year'] = null;
        }

        if (Experience::create($validated)) {
            $notification = array(
                'messege' => 'Experience Added Successfully',
                'type' => 'success'
            );
            return redirect()->route('experience.index')->with($notification);
        }

        $notification = array(
            'messege' => 'Failed to add experience',
            'type' => 'error'
        );
        return redirect()->back()->withInput()->with($notification);
    }

    /**
     * Show the form for editing the specified experience
     */
    public function edit($id)
    {
        $data = Experience::findOrFail($id);
        return view('admin.experience.edit', compact('data'));
    }

    /**
     * Update the specified experience in database
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'start_year' => 'required|integer|digits:4',
            'end_year' => 'nullable|integer|digits:4|gte:start_year',
            'is_current' => 'nullable|boolean',
            'description' => 'nullable|string',
        ]);

        $experience = Experience::findOrFail($id);

        // If is_current is true, set end_year to null
        if ($validated['is_current'] ?? false) {
            $validated['end_year'] = null;
        }

        if ($experience->update($validated)) {
            $notification = array(
                'messege' => 'Experience Updated Successfully',
                'type' => 'success'
            );
            return redirect()->route('experience.index')->with($notification);
        }

        $notification = array(
            'messege' => 'Failed to update experience',
            'type' => 'error'
        );
        return redirect()->back()->withInput()->with($notification);
    }

    /**
     * Delete the specified experience from database
     */
    public function delete($id)
    {
        $experience = Experience::findOrFail($id);

        if ($experience->delete()) {
            $notification = array(
                'messege' => 'Experience Deleted Successfully',
                'type' => 'success'
            );
            return redirect()->route('experience.index')->with($notification);
        }

        $notification = array(
            'messege' => 'Failed to delete experience',
            'type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
