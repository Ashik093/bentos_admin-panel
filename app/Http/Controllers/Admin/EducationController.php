<?php

namespace App\Http\Controllers\Admin;

use App\Models\Education;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EducationController extends Controller
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
        $data = Education::orderBy('start_year', 'desc')->get();
        return view('admin.education.index', compact('data'));
    }

    /**
     * Show the form for creating a new experience
     */
    public function create()
    {
        return view('admin.education.create');
    }

    /**
     * Store a newly created experience in database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'degree' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'start_year' => 'required|integer|digits:4',
            'end_year' => 'nullable|integer|digits:4|gte:start_year',
            'description' => 'nullable|string',
        ]);

        if (Education::create($validated)) {
            $notification = array(
                'messege' => 'Education Added Successfully',
                'type' => 'success'
            );
            return redirect()->route('education.index')->with($notification);
        }

        $notification = array(
            'messege' => 'Failed to add education',
            'type' => 'error'
        );
        return redirect()->back()->withInput()->with($notification);
    }

    /**
     * Show the form for editing the specified experience
     */
    public function edit($id)
    {
        $data = Education::findOrFail($id);
        return view('admin.education.edit', compact('data'));
    }

    /**
     * Update the specified experience in database
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'degree' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'start_year' => 'required|integer|digits:4',
            'end_year' => 'nullable|integer|digits:4|gte:start_year',
            'description' => 'nullable|string',
        ]);

        $education = Education::findOrFail($id);

        if ($education->update($validated)) {
            $notification = array(
                'messege' => 'Education Updated Successfully',
                'type' => 'success'
            );
            return redirect()->route('education.index')->with($notification);
        }

        $notification = array(
            'messege' => 'Failed to update education',
            'type' => 'error'
        );
        return redirect()->back()->withInput()->with($notification);
    }

    /**
     * Delete the specified experience from database
     */
    public function delete($id)
    {
        $education = Education::findOrFail($id);

        if ($education->delete()) {
            $notification = array(
                'messege' => 'Education Deleted Successfully',
                'type' => 'success'
            );
            return redirect()->route('education.index')->with($notification);
        }

        $notification = array(
            'messege' => 'Failed to delete education',
            'type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
