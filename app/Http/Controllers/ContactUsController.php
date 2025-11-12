<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Mail\ContactUsMail;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(Request $request)
    {
        $setting = Setting::first();
        $details = [
            'name' => $request->name,
            'emailPhone' => $request->emailPhone,
            'description'=>$request->description,
            'emailbg'=>$setting->emailbg
        ];
       
        \Mail::to($setting->email)->send(new ContactUsMail($details));
        return true;
    }
}
