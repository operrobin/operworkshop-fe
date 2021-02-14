<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    const RESMI = 1;
    const UMUM = 2;

    protected $table = "workshop_bengkels";
}
