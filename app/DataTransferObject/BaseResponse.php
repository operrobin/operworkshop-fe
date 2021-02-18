<?php

namespace App\DataTransferObject;

class BaseResponse{
    public $status = false;
    public $code = 500;
    public $message = "Some Message";
    public $data = null;

    public function __construct($data, $message, $code = 200){
        $this->status = ($code > 399) ? false : true;
        $this->code = $code;
        $this->message = $message;
        $this->data = $data;
    }

    public static function ok($data, $message, $code = 200){
        return response()->json(
            new BaseResponse(
                $data,
                $message,
                $code
            )
            , $code);
    }

    public static function error($message, $code = 500, $data = null){
        return response()->json(
            new BaseResponse(
                $data,
                $message,
                $code
            )
        );
    }
}