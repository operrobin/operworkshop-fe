<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MasterTask extends Model
{
    protected $table = "task_masters";

    public function tasks(){
        return $this->hasMany('App\Model\TaskList', 'master_task_id', 'id');
    }

    public function order(){
        return $this->belongsTo('App\Model\OperOrder', 'master_task', 'id');
    }
}
