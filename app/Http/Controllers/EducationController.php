<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::orderBy('id','desc')->get();
        return response()->json($educations);
    }

    public function show($id)
    {
        $education = Education::find($id);
        if (!$education) {
            return response()->json(['message' => 'Education not found'], 404);
        }
        return response()->json($education);
    }
}
