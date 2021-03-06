<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PhoneOTP extends Model
{
    const REGISTER = 1;
    const LOGIN = 2;

    protected $table = "otp_verifications";
    public $timestamps = false;
}
