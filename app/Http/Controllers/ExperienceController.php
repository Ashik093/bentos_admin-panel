<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::all();
        return response()->json($experiences);
    }

    public function show($id)
    {
        $experience = Experience::find($id);
        if (!$experience) {
            return response()->json(['message' => 'Experience not found'], 404);
        }
        return response()->json($experience);
    }
}
