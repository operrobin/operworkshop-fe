<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use DB;

class BengkelSetting extends Model
{
    protected $table = "bengkel_settings";

    public $timestamps = false;

    public function workshop(){
        return $this->belongsTo('App\Model\Workshop', 'id', 'workshop_bengkel_id');
    }
}
