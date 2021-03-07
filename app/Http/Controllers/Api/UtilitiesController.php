<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\NoSQL\OpertaskToken;
use App\DataTransferObject\BaseResponse;

class UtilitiesController extends Controller
{
    public function getOperTaskToken(){
        return BaseResponse::ok(
            [
                "token" => OpertaskToken::all()->first()->bearer_token
            ], 
            'Successfully getting token.'
        );
    }
}
