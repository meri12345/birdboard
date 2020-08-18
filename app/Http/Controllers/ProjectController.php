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
           'notes'=>'max:1000'
        ]);

        $project = auth()->user()->projects()->create($attr);
        return redirect($project->path());
    }

    public function show(Project $project){
        $this->authorize('update',$project);
        return view('projects.show',compact('project'));
    }

    public function create(){
        return view('projects.create');
    }

    public function update(Project $project)
    {
        $this->authorize('update',$project);

        $project->update([
            'notes'=>\request('notes')
        ]);

        return redirect($project->path());
    }

}
