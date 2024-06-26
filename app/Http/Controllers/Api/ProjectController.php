<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::with('type', 'technologies')->paginate(15);
        return response()->json($projects);
    }

    public function getProjectBySlug($slug){

        $project = Project::where('slug', $slug)->with('type')->first();
        if($project){
            $success = true;
        }else{
            $success = false;
        }

        return response()->json(compact('success', 'project'));
    }
}
