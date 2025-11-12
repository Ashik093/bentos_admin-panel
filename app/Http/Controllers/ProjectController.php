<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectItem;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function project()
    {
        return Project::get();
    }

    public function projectItem($id)
    {
        return ['data'=>ProjectItem::where('project_id',$id)->get(),'project'=>Project::find($id)];
    }
}
