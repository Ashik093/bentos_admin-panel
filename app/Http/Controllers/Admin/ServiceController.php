<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of all services
     */
    public function index()
    {
        $data = Service::orderBy('order', 'asc')->get();
        return view('admin.service.index', compact('data'));
    }

    /**
     * Show the form for creating a new service
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created service in database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'order' => 'nullable|integer|min:0',
        ]);

        if (Service::create($validated)) {
            $notification = array(
                'messege' => 'Service Added Successfully',
                'type' => 'success'
            );
            return redirect()->route('service.index')->with($notification);
        }

        $notification = array(
            'messege' => 'Failed to add service',
            'type' => 'error'
        );
        return redirect()->back()->withInput()->with($notification);
    }

    /**
     * Show the form for editing the specified service
     */
    public function edit($id)
    {
        $data = Service::findOrFail($id);
        return view('admin.service.edit', compact('data'));
    }

    /**
     * Update the specified service in database
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'order' => 'nullable|integer|min:0',
        ]);

        $service = Service::findOrFail($id);

        if ($service->update($validated)) {
            $notification = array(
                'messege' => 'Service Updated Successfully',
                'type' => 'success'
            );
            return redirect()->route('service.index')->with($notification);
        }

        $notification = array(
            'messege' => 'Failed to update service',
            'type' => 'error'
        );
        return redirect()->back()->withInput()->with($notification);
    }

    /**
     * Delete the specified service from database
     */
    public function delete($id)
    {
        $service = Service::findOrFail($id);

        if ($service->delete()) {
            $notification = array(
                'messege' => 'Service Deleted Successfully',
                'type' => 'success'
            );
            return redirect()->route('service.index')->with($notification);
        }

        $notification = array(
            'messege' => 'Failed to delete service',
            'type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
