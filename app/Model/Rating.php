<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = "rating_system";

    public function order(){
        return $this->belongsTo('App\Model\OperOrder', 'id', 'order_id');
    }
}
