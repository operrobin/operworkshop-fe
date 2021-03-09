<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\DataTransferObject\BaseResponse;

use App\Model\CustomerOper;
use App\Model\PhoneOTP;

use App\Helper\OTPHelper;

use Session;

class AuthController extends Controller
{
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
                    ::where('customer_hp', "0".$request->get('phone_number'))
                    ->get()
                    ->first();

        /**
         * Send OTP in here
         */
        
        $helper = new OTPHelper();
        

        if(env('OTP_MODE') == "FAKE"){
            $helper->fakeOTP(
                "0".$request->get('phone_number'),
                empty($customer) ? PhoneOTP::REGISTER : PhoneOTP::LOGIN
            );
        }else{
            $helper->triggerOTP(
                "0".$request->get('phone_number'),
                empty($customer) ? PhoneOTP::REGISTER : PhoneOTP::LOGIN
            );
        }

        return BaseResponse::ok(
            null,
            "OTP Sent to {$request->get('phone_number')}."
        );
    }

    

    /**
     * sendOTP
     * An API to check OTP validity.
     */
    public function sendOTP(Request $request){
        $v = validator()->make($request->all(), [
            "phone" => "required|exists:otp_verifications,phone",
            "otp" => "required"
        ]);

        if ($v->fails()){
            return BaseResponse::error($v->getMessageBag()->first(), 500);
        }

        $otp = PhoneOTP
                ::where('phone', $request->get('phone'))
                ->where('otp_code', $request->get('otp'))
                ->orderBy('id', 'DESC')
                ->get()
                ->first();

        if(empty($otp)){
            return BaseResponse::error(
                "OTP Code Invalid"
            );
        }

        return BaseResponse::ok(
            Session::get('customer_phone'),
            "Authentication successful"
        );
    }
}
