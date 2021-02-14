<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\DataTranserObject\BaseResponse;

use App\Model\CustomerOper;

class UserController extends Controller
{

    /**
     * applyBooking
     * An API to register user's bookings information
     */
    public function applyBooking(Request $request){
        $v = validator()->make($request->all(), [
            "name" => "required",
            "phone" => "required|digits_between:9,15",
            "email" => "required|email:rfc"
        ]); 

        if($v->fails()){
            return BaseResponse::error($v->getMessageBag()->first(), 500);
        }

        $customer = CustomerOper
                    ::where('customer_phone', $request->get('phone'))
                    ->orWhere('customer_email', $request->get('email'))
                    ->get()
                    ->first();

        if(empty($customer)){
            $customer = new CustomerOper();
            $customer->customer_name = $request->get('name');
            $customer->customer_phone = $request->get('phone');
            $customer->customer_email = $request->get('email');
            $customer->joined_date = new \DateTime('now');
            $customer->save();
        }

        
        
    }
}
