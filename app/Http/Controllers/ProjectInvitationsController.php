<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
use Illuminate\Http\Request;

class ProjectInvitationsController extends Controller
{
    public function store (Project $project){

        $this->authorize('delete',$project);

        \request()->validate([
            'email'=>['required','exists:users,email']
        ]);

        $user = User::whereEmail(\request('email'))->first();
        $project->invite($user);

        return redirect($project->path());
    }
}
