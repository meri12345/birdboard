<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::all();
        return view('projects.index',compact('projects'));
    }

    public function store(){

        request()->validate([
            'title'=>'required',
            'desc'=>'required',
            'owner_id'=>'required'
        ]);
        Project::create(request(['title','desc']));
        return redirect('/projects');
    }

    public function show(Project $project){
        return view('projects.show',compact('project'));
    }
}
