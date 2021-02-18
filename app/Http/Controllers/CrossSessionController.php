<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

class CrossSessionController extends Controller
{
    public function setWebSession(Request $request){
        $v = validator()->make($request->all(), [
            "key" => "required",
            "value" => "required"
        ]);

        if ($v->fails()){
            return BaseResponse::error($v->getMessageBag()->first(), 500);
        }

        Session::put(
            $request->get('key'),
            $request->get('value')
        );
        Session::save();

        return 0;
    }
}
