<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\DataTransferObject\BaseResponse;

use App\Helper\ManualPaginationHelper;

use App\Model\Workshop;

use DB;

use App\Services\GoogleMapsServices;

class WorkshopController extends Controller
{
    /**
     * getWorkshopByType
     * An API to get Workshop by it's type.
     * @see \App\Model\Workshop for more details
     * 
     * @param integer type
     * 
     * @return array \App\Model\Workshop::class
     */
    public function getWorkshopByType(Request $request){
        $v = validator()->make($request->all(), [
            "type" => "required"
        ]);

        if($v->fails()){
            return BaseResponse::error($v->getMessageBag()->first(), 500);
        }

        return BaseResponse::ok(
            Workshop
                ::where('bengkel_tipe', $request->get('type'))
                ->get(),
            "Success get all workshop datas."
        );
    }

    /**
     * getWorkshopByType
     * An API to get Workshop by it's type.
     * @see \App\Model\Workshop for more details
     * 
     * @param integer page => not mandatory
     * @param integer type
     * @param double lat
     * @param double lng
     * 
     * @return array \App\Model\Workshop::class
     */
    public function getWorkshopNearMe(Request $request){
        $v = validator()->make($request->all(), [
            "type" => "required",
            "lat" => "required",
            "lng" => "required",
            "vehicle_type" => "required"
        ]);

        if($v->fails()){
            return BaseResponse::error($v->getMessageBag()->first(), 500);
        }

        $google = new GoogleMapsServices();

        /**
         * @todo refactor dis!!!
         * There's O(2n) here. Please consider to refactor this code.
         */
        $resultSet = Workshop
                        ::where('bengkel_status', Workshop::ACTIVE)
                        ->where('vehicle_type', $request->get('vehicle_type'))
                        ->get();

        $response = [];

        $req =  [];

        foreach($resultSet as $set){
            array_push($req, [
                (object) [
                    "lat" => $request->get('lat'),
                    "lng" => $request->get('lng')
                ],
                (object) [
                    "lat" => $set->bengkel_lat,
                    "lng" => $set->bengkel_long
                ]
            ]);


            // $distance = (double) (
            //     $google->distanceMatrix(
            //         (object) [
            //             "lat" => $request->get('lat'),
            //             "lng" => $request->get('lng')
            //         ],
            //         (object) [
            //             "lat" => $set->bengkel_lat,
            //             "lng" => $set->bengkel_long
            //         ]
            //     )->rows[0]->elements[0]->distance->value / 1000);


            // if($distance > (double) 10){
            //     continue;
            // }

            // $set->distance = $distance;
            // array_push($response, $set);
        }

        $res = $google->check(
            $req
        );

        return BaseResponse::ok($res, "Ngee");
        

        return BaseResponse::ok(
            new ManualPaginationHelper(
                $response,
                $request->get('page') ?? 1
            ),
            "A"
        );
    }
}
