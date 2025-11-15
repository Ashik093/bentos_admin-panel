<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Models\WhoAreWe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }
    public function index()
    {
        $data = Setting::first();
        return view('admin.setting.edit',compact('data'));
    }
    
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'phone' => 'required',
            'title' => 'required',
            'email'=>'required'
        ]);
        $data =  Setting::first();
        
        $data->title = $request->title;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->office = $request->office;
        $data->meta_description = $request->meta_description;
        $image = $request->logo;
        $imageBg = $request->emailbg;
        $favIcon = $request->favicon;
    
        if ($image) {
        	$imageName = date('dm').uniqid().'1.'.$image->getClientOriginalExtension();
        	Image::make($image)->save(public_path("/uploads/setting/".$imageName),40);
        	$data->logo = "uploads/setting/".$imageName;
        }
        if ($imageBg) {
        	$imageName = date('dm').uniqid().'1.'.$imageBg->getClientOriginalExtension();
        	Image::make($imageBg)->save(public_path("/uploads/setting/".$imageName),40);
        	$data->emailbg = "uploads/setting/".$imageName;
        }
        if ($favIcon) {
        	$imageName = date('dm').uniqid().'1.'.$favIcon->getClientOriginalExtension();
        	Image::make($favIcon)->save(public_path("/uploads/setting/".$imageName),40);
        	$data->favicon = "uploads/setting/".$imageName;
        }


        
        if ($data->save()) {
    		$notification = array(
    			'messege'=>'Info Saved',
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
