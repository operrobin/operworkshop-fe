<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\DataTransferObject\BaseResponse;

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
    public function getMasterBrands(Request $request){
        $v = validator()->make($request->all(), [
            "type" => "required|in:1,2"
        ]); 

        if($v->fails()){
            return BaseResponse::error($v->getMessageBag()->first(), 500);
        }

        return BaseResponse::ok(
            MasterBrand
                ::where('brand_type', $request->get('type'))
                ->get(),
            "Success getting all master brands data"
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
