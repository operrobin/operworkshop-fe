<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    protected $table = "task_lists";

    public $timestamps = false;

    protected $appends = [
        'image_url'
    ];

    public function task_master(){
        return $this->belongsTo('App\Model\MasterTask', 'id', 'master_task_id');
    }

    public function getImageUrlAttribute(){
        return env('CMS_URL')."task/".$this->image_name;
    }
}
