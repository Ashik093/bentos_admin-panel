<?php

namespace App\Http\Controllers\Admin;

use App\Models\SocialLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SocialLinkController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }
    public function index()
    {
        $data = SocialLink::get();
        return view('admin.social.index',compact('data'));
    }
    public function create()
    {
       
        return view('admin.social.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'icon' => 'required',
            'link' => 'required|unique:social_links',
            'name' => 'required|unique:social_links'
        ]);
        $data = new SocialLink();

        $data->link = $request->link;
        $data->name = $request->name;

        $image = $request->icon;
    
        if ($image) {
        	$imageName = date('dm').uniqid().'1.'.$image->getClientOriginalExtension();
        	Image::make($image)->save(public_path("/uploads/icon/".$imageName),20);
        	$data->icon = "uploads/icon/".$imageName;
        }
        if ($data->save()) {
    		$notification = array(
    			'messege'=>'Social Link Saved',
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
        $data = SocialLink::find($id);
        return view('admin.social.edit',compact('data'));
    }
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'link' => 'required',
            'name' => 'required'
        ]);
        $data = SocialLink::find($id);
        $data->link = $request->link;
        $data->name = $request->name;

        $image = $request->icon;
    
        if ($image) {
        	$imageName = date('dm').uniqid().'1.'.$image->getClientOriginalExtension();
        	Image::make($image)->save(public_path("/uploads/icon/".$imageName),20);
        	$data->icon = "uploads/icon/".$imageName;
        }
        
        if ($data->save()) {
    		$notification = array(
    			'messege'=>'Social Updated',
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
        


        $data = SocialLink::find($id);
            if ($data->delete()) {
                $notification = array(
                    'messege'=>'Social Link Deleted',
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
