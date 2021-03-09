<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\DataTransferObject\BaseResponse;

use App\Model\CustomerOper;

class UserController extends Controller
{

    /**
     * getUserByPhone
     * An API to get User by inputting Phone Number.
     */
    public function getUserByPhone(Request $request){
        $v = validator()->make($request->all(), [
            "phone" => "required",
        ]); 

        if($v->fails()){
            return BaseResponse::error($v->getMessageBag()->first(), 500);
        }

        $customer = CustomerOper
                    ::where('customer_hp', "0".$request->get('phone'))
                    ->get()
                    ->first();

        if(empty($customer)){
            return BaseResponse::error(
                $request->get('phone'),
                "User with inputted phone number not found",
                404
            );
        }

        return BaseResponse::ok(
            $customer,
            "User found."
        );
    }
}
