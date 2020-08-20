<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    protected $guarded=[];
    protected $touches=['project'];

    public function complete(){
        $this->update([
            'completed'=>now()
        ]);

        $this->createActivity('task_completed');
    }

    public function incomplete(){
        $this->update([
            'completed'=> null
        ]);
        $this->createActivity('task_uncompleted');

    }

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function path(){
        return $this->project->path().'/tasks/'.$this->id;
    }

    public function activities(){
      return $this->morphMany(Activity::class,'subject')->latest();
    }

    public function createActivity($type){
        $this->activities()->create([
            'desc'=>$type,
            'user_id'=>auth()->id(),
            'project_id'=>$this->project->id
        ]);
    }

}
