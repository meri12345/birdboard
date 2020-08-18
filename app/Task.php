<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    protected $guarded=[];
    protected $touches=['project'];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function path(){
        return $this->project->path().'/tasks/'.$this->id;
    }

}
