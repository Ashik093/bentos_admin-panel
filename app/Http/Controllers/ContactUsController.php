<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(Request $request)
    {
        ContactUs::create([
            'name' => $request->name,
            'emailPhone' => $request->emailPhone,
            'description' => $request->description,
        ]);

        return response()->json(['message' => 'Contact us message stored successfully'], 201);
    }
}
