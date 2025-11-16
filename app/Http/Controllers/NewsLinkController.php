<?php

namespace App\Http\Controllers;

use App\Models\NewsLink;
use Illuminate\Http\Request;

class NewsLinkController extends Controller
{
    public function index()
    {
        $companies = NewsLink::all();
        return response()->json($companies);
    }

}
