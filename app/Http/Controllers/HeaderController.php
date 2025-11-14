<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\WhoAreWe;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function header()
    {
        return Setting::first();
    }
    public function getInTouch()
    {
        return WhoAreWe::first();
    }
}
