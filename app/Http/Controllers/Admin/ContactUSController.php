<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\ContactUs;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ContactUSController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }
    public function index()
    {
        $data = ContactUs::orderBy('id','desc')->get();
        return view('admin.contact.index',compact('data'));
    }
    
}
