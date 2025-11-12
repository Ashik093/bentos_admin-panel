<?php

namespace App\Http\Controllers\Admin;

use App\Models\WhoAreWe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WhoAreWeController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }
    public function index()
    {
        $data = WhoAreWe::first();
        return view('admin.whoarewe.edit',compact('data'));
    }
    
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $data =  WhoAreWe::first();
        $data->title = $request->title;
        $data->description = $request->description;
        

        
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
