<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded=[];

    public function path(){
        return '/projects/'.$this->id;
    }
    public function createActivity($type){
        $this->activities()->create([
            'desc'=>$type
        ]);
    }

    public function owner(){
       return  $this->belongsTo(User::class);
    }

    public function addTask($body){
        return $this->tasks()->create([
            'body'=>$body
        ]);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function activities(){
        return $this->hasMany(Activity::class);
    }
}
