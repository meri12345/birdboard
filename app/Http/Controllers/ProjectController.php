<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = auth()->user()->projects;
        return view('projects.index',compact('projects'));
    }

    public function store(){

       $attr= request()->validate([
            'title'=>'required',
            'desc'=>'required',
        ]);

        $project = auth()->user()->projects()->create($attr);
        return redirect($project->path());
    }

    public function show(Project $project){
        if(auth()->user()->isNot($project->owner)){
            abort(403);
        }
        return view('projects.show',compact('project'));
    }

    public function create(){
        return view('projects.create');
    }

}
