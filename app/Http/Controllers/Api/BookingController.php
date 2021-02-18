<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function makeOrder(Request $request){
        $v = validator()->make($request->all(), [
            "customer_name" => "required",
            "customer_phone" => "required",
            "customer_email" => "required",
            "vehicle_type" => "required",
        ]);
    }
}
