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

       $attr= request()->validate([
            'title'=>'required',
            'desc'=>'required',
        ]);

        auth()->user()->projects()->create($attr);
        return redirect('/projects');
    }

    public function show(Project $project){
        return view('projects.show',compact('project'));
    }
}
