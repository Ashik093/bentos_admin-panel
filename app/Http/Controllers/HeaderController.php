<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function header()
    {
        return Setting::first();
    }
}
