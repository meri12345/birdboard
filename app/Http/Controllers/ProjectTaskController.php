<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Http\Request;

class ProjectTaskController extends Controller
{
    public function store(Project $project){

        $this->authorize('update',$project);

        \request()->validate(['body'=>'required|min:3']);
        $project->addTask(\request('body'));
        return redirect($project->path());
    }
    public function update(Project $project, Task $task){

        $this->authorize('update',$task->project);

        \request()->validate(['body'=>'required']);
        $task->update([
            'body'=>\request('body'),
        ]);
        if (\request()->has('completed')){
            $task->complete();
        }
        else{
            $task->incomplete();
        }
        return redirect($project->path());
    }

}
