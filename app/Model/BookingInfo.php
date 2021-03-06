<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BookingInfo extends Model
{
    protected $table = "booking_order_info";

    public $timestamps = false;

    public function oper_order(){
        return $this->belongsTo('App\Model\OperOrder', 'booking_no', 'booking_no');
    }
}
