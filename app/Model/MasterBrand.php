<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MasterBrand extends Model
{
    const MOBIL = 1;
    const MOTOR = 2;

    protected $table = "master_brands";
}
