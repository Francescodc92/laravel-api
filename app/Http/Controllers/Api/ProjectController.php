<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//models
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() {
        $success = true;
        $results = Project::with('technologies', 'type')->paginate(4);
        return response()->json(compact('success', 'results'));
    }

    public function show(string $id){
       
        $results = Project::find($id);
        $success = false;
        if($results){
            $success = true;
        }else{
            $results = 'not found';
        }

        return response()->json(compact('success', 'results'));
        
    }
}
