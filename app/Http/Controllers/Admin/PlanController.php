<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of all plans
     */
    public function index()
    {
        $data = Plan::all();
        return view('admin.plan.index', compact('data'));
    }

    /**
     * Show the form for creating a new plan
     */
    public function create()
    {
        return view('admin.plan.create');
    }

    /**
     * Store a newly created plan in database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'per' => 'nullable|string|max:255',
            'features' => 'nullable|string',
            'is_popular' => 'nullable|boolean',
            'button_label' => 'nullable|string|max:255',
        ]);

        // Convert features string to array for JSON storage

        if (Plan::create($validated)) {
            $notification = array(
                'messege' => 'Plan Added Successfully',
                'type' => 'success'
            );
            return redirect()->route('plan.index')->with($notification);
        }

        $notification = array(
            'messege' => 'Failed to add plan',
            'type' => 'error'
        );
        return redirect()->back()->withInput()->with($notification);
    }

    /**
     * Show the form for editing the specified plan
     */
    public function edit($id)
    {
        $data = Plan::findOrFail($id);
        return view('admin.plan.edit', compact('data'));
    }

    /**
     * Update the specified plan in database
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'per' => 'nullable|string|max:255',
            'features' => 'nullable|string',
            'is_popular' => 'nullable|boolean',
            'button_label' => 'nullable|string|max:255',
        ]);

        // Convert features string to array for JSON storage

        $plan = Plan::findOrFail($id);

        if ($plan->update($validated)) {
            $notification = array(
                'messege' => 'Plan Updated Successfully',
                'type' => 'success'
            );
            return redirect()->route('plan.index')->with($notification);
        }

        $notification = array(
            'messege' => 'Failed to update plan',
            'type' => 'error'
        );
        return redirect()->back()->withInput()->with($notification);
    }

    /**
     * Delete the specified plan from database
     */
    public function delete($id)
    {
        $plan = Plan::findOrFail($id);

        if ($plan->delete()) {
            $notification = array(
                'messege' => 'Plan Deleted Successfully',
                'type' => 'success'
            );
            return redirect()->route('plan.index')->with($notification);
        }

        $notification = array(
            'messege' => 'Failed to delete plan',
            'type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
