<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\ProjectItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ProjectController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }
    public function index()
    {
        $data = Project::get();
        return view('admin.project.index',compact('data'));
    }
    public function create()
    {
        return view('admin.project.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);
        $data = new Project();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->extra_description = $request->extra_description;
        
        $image = $request->image;
    
        if ($image) {
        	$imageName = date('dm').uniqid().'1.'.$image->getClientOriginalExtension();
        	Image::make($image)->save(public_path("/uploads/project/".$imageName),40);
        	$data->image = "uploads/project/".$imageName;
        }
        
        
        if ($data->save()) {
    		$notification = array(
    			'messege'=>'Project Saved',
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
        
        $data = Project::find($id);
        return view('admin.project.edit',compact('data'));
    }
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
    	
        $data = Project::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->extra_description = $request->extra_description;
        
        $image = $request->image;
    
        if ($image) {
        	$imageName = date('dm').uniqid().'1.'.$image->getClientOriginalExtension();
        	Image::make($image)->save(public_path("/uploads/project/".$imageName),40);
        	$data->image = "uploads/project/".$imageName;
        }
        
        if ($data->save()) {
    		$notification = array(
    			'messege'=>'Project Updated',
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
        $check = ProjectItem::where('project_id',$id)->first();
        if($check){
            $notification = array(
                'messege'=>'Product can not be deleted, because project has item item exist',
                'type'=>'success'
            );
    
                return Redirect()->back()->with($notification);
        }
        $data = Project::find($id);
        if ($data->delete()) {
            $notification = array(
                'messege'=>'Project Deleted',
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
