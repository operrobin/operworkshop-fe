<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ForemanTaskProgress extends Model
{
    protected $table = "task_progress";

    protected $appends = [
        "image_uri"
    ];

    public function operOrder(){
        return $this->belongsTo('App\Model\OperOrder', 'id', 'order_id');
    }

    public function task(){
        return $this->hasOne('App\Model\TaskList', 'id', 'task_id');
    }

    public function getImageUriAttribute(){

        /**
         * Manual parsing saved image url
         */
        $text_length = strlen($this->image_name);
        $index = -1;
        $file_name_length = 1;

        for($i = $text_length; $i > 0; $i--){
            if($this->image_name[$i-1] == '/'){
                $index = $i-1;
                break;
            }

            $file_name_length++;
        }

        return env('CMS_URL')."files/task/".substr($this->image_name, $index, $file_name_length);
    }
}
