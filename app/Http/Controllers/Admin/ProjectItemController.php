<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\ProjectItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ProjectItemController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }
    public function index()
    {
        $data = ProjectItem::with('project')->get();
        return view('admin.projectItem.index',compact('data'));
    }
    public function create()
    {
        $project = Project::get();
        return view('admin.projectItem.create',compact('project'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'project_id' => 'required',
            'is_left' => 'required',
        ]);
        $data = new ProjectItem();
        $data->project_id = $request->project_id;
        $data->is_left = $request->is_left;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->extra_description = $request->extra_description;
        
        $image = $request->image;
    
        if ($image) {
        	$imageName = date('dm').uniqid().'1.'.$image->getClientOriginalExtension();
        	Image::make($image)->save(public_path("/uploads/projectitem/".$imageName),40);
        	$data->image = "uploads/projectitem/".$imageName;
        }
        
        
        if ($data->save()) {
    		$notification = array(
    			'messege'=>'Project Item Saved',
    			'type'=>'success'
    		);

   			return Redirect()->back()->with($notification);
        }else{
        	$notification = array(
    			'messege'=>'Unsuccessful',
    			'type'=>'error'
    		);

    		return Redirect()->back()->with($notification);
        }
    }
    public function edit($id)
    {
        $project = Project::get();
        $data = ProjectItem::find($id);
        return view('admin.projectItem.edit',compact('data','project'));
    }
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'project_id' => 'required',
            'is_left' => 'required',
        ]);
    	
        $data = ProjectItem::find($id);
        $data->project_id = $request->project_id;
        $data->is_left = $request->is_left;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->extra_description = $request->extra_description;
        
        $image = $request->image;
    
        if ($image) {
        	$imageName = date('dm').uniqid().'1.'.$image->getClientOriginalExtension();
        	Image::make($image)->save(public_path("/uploads/projectitem/".$imageName),40);
        	$data->image = "uploads/projectitem/".$imageName;
        }
        
        if ($data->save()) {
    		$notification = array(
    			'messege'=>'Project Item Updated',
    			'type'=>'success'
    		);

   			return Redirect()->back()->with($notification);
        }else{
        	$notification = array(
    			'messege'=>'Unsuccessful',
    			'type'=>'error'
    		);

    		return Redirect()->back()->with($notification);
        }
    }
    public function delete($id)
    {
        
        $data = ProjectItem::find($id);
        if ($data->delete()) {
            $notification = array(
                'messege'=>'Project Item Deleted',
                'type'=>'success'
            );
    
                return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );
    
            return Redirect()->back()->with($notification);
        }
        
    }
}
