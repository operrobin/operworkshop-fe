<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\DataTransferObject\BaseResponse;

use App\Model\CustomerOper;
use App\Model\PhoneOTP;

use Session;

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

        /**
         * Send OTP in here
         */

        /**
         * Put customer's phone to Session
         */
        Session::put('customer_phone', $request->get('phone_number'));
        
        return BaseResponse::ok(
            null,
            "OTP Sent."
        );
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

        $otp = PhoneOTP
                ::where('phone', $request->get('phone'))
                ->where('otp_code', $request->get('otp'))
                ->get()
                ->first();

        if(empty($otp)){
            return BaseResponse::error(
                "OTP Code or Phone Number Not Found"
            );
        }

        /**
         * Save Phone to Session
         */

        
    }

}
