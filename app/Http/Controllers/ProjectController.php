<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = auth()->user()->show();
        return view('projects.index',compact('projects'));
    }

    public function store(){

       $attr= request()->validate([
            'title'=>'required',
            'desc'=>'required',
           'notes'=>'max:1000'
        ]);

       $project = auth()->user()->projects()->create($attr);

       if(\request()->has('tasks')){
           foreach (\request('tasks') as $task){
                $project->addTask($task['value']);
           }
       }

        return redirect('/projects');
    }

    public function show(Project $project){
        $this->authorize('update',$project);
        return view('projects.show',compact('project'));
    }

    public function create(){
        return view('projects.create');
    }

//    public function update(Project $project)
//    {
//        $this->authorize('update',$project);
//
//        if(\request()->has('notes')){
//            $project->update(
//                \request()->validate([
//                    'notes'=>'min:3'
//                ])
//            );
//        }
//        else{
//            $project->update(
//                \request()->validate([
//                    'title'=>'required',
//                    'desc'=>'required'
//                ])
//            );
//        }
//
//
//        return redirect($project->path());
//    }

    public function update(Project $project)
    {
        $this->authorize('update',$project);

            $project->update(
                \request()->validate([
                    'title'=>'sometimes|required',
                    'desc'=>'sometimes|required',
                    'notes'=>'nullable'
                ])
            );


        return redirect($project->path());
    }

    public function edit(Project $project){
        return view('projects.edit',compact('project'));
    }

    public function destroy(Project $project){
        $this->authorize('delete',$project);
        $project->delete();
        return redirect('/projects');
    }

}
