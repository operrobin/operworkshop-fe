<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\DataTranserObject\BaseResponse;

use App\Model\CustomerOper;

class AuthController extends Controller
{

    public function __construct(){

    }

    /**
     * authentication
     * An API to login or signup by User's Phone Number, and send OTP to do login.
     * 
     * @param string phone
     * 
     */
    public function authentication(Request $request){
        $v = validator()->make($request->all(), [
            'phone_number' => "required"
        ]);

        if ($v->fails()) {
            return BaseResponse::error($v->getMessageBag()->first(), 500);
        }

        $customer = CustomerOper
                    ::where('customer_hp', $request->get('phone_number'))
                    ->get()
                    ->first();

        if(empty($customer)){
            $customer = new CustomerOper();
        }
    }

    

    /**
     * sendOTP
     * An API to sendOTP via Whatsapp Number
     */
    public function sendOTP(Request $request){
        $v = validator()->make($request->all(), [
            "phone" => "required|exists:customer_opers,customer_hp",
            "otp" => "required"
        ]);

        if ($v->fails()){
            return BaseResponse::error($v->getMessageBag()->first(), 500);
        }

        
    }

}
