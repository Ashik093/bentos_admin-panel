<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dealer;
use App\Models\Product;
use App\Models\Project;
use App\Models\Category;
use App\Models\Location;
use App\Models\ForeignTile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category = Category::count();
        $project = Project::count();
        return view('home',compact('category','project'));
    }
    public function changePassword()
    {
        return view('admin.profile.changePassword');
    }

    public function updatePassword(Request $request)
    {
        $validatedData = $request->validate([
            'password'=>'required|confirmed|min:6'
        ]);

        $data = User::find(auth()->user()->id);
        $data->password = Hash::make($request->password);
        if ($data->save()) {
            $notification = array(
                'messege'=>'Password Successfully Updated',
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
