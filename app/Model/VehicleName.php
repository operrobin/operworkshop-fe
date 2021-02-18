<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VehicleName extends Model
{
    protected $table = "vehicle_names";

    public function master_brand(){
        return $this->belongsTo('App\Model\MasterBrand', 'id', 'master_brand_id');
    }
}
