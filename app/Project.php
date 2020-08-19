<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded=[];
    public $old=[];

    public function path(){
        return '/projects/'.$this->id;
    }
    public function createActivity($type){

      $this->old['created_at']= '';
      $this->old['updated_at']='';

      $current = $this->getAttributes();
      $current['created_at']='';
      $current['updated_at']='';

        $this->activities()->create([

            'desc'=>$type,
            'changes'=>$type=='project_updated' ? [
                'before'=>array_diff($this->old,$current),
                'after'=>array_diff($current,$this->old)
            ] : null
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
        return $this->hasMany(Activity::class)->latest();
    }
}
