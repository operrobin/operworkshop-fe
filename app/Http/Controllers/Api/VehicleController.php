<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\DataTranserObject\BaseResponse;

use App\Model\MasterBrand;
use App\Model\VehicleName;

class VehicleController extends Controller
{
    /**
     * getVehicleTypes
     * An API to get all datas from MasterBrands
     * 
     * @return array MasterBrand
     */
    public function getVehicleTypes(){
        return BaseResponse::ok(
            MasterBrand::all()
        );
    }

    /**
     * getVehicle
     * An API to get all datas from VehicleName
     * 
     * @param integer master_brand_id
     * 
     * @return array VehicleName
     */
    public function getVehicle(Request $request){
        $v = validator()->make($request->all(), [
            "master_brand_id" => "required|exists:master_brands,id"
        ]); 

        if($v->fails()){
            return BaseResponse::error($v->getMessageBag()->first(), 500);
        }

        return BaseResponse::ok(
            VehicleName
                ::where('master_brand_id', $request->get('master_brand_id'))
                ->get()
            , "Success getting all vehicle name datas."
        );
    }
}
