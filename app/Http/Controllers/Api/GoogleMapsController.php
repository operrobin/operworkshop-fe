<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\GoogleMapsServices;

use App\DataTransferObject\BaseResponse;

use App\Model\Workshop;

class GoogleMapsController extends Controller
{
    public function getWorkshopNearMe(Request $request){
        $v = validator()->make($request->all(), [
            "lat" => "required",
            "lng" => "required",
            "bengkel_type" => "required",
            "vehicle_type" => "required"
        ]);

        if ($v->fails()) {
            return BaseResponse::error($v->getMessageBag()->first(), 500);
        }
        
        $service = new GoogleMapsServices();

        $response = $service->searchNearbyWorkshop(
            $request->get('lat'),
            $request->get('lng')
        );

        $response_payload = [];

        foreach($response->results as $set){

            $result_set = Workshop
                            ::where('bengkel_name', $set->name)
                            ->where('vehicle_type', $request->get('vehicle_type'))
                            ->where('bengkel_tipe', $request->get('bengkel_type'))
                            ->get()
                            ->first();

            if(empty($result_set)){

                if(strlen($set->name) >= 44){
                    $set->name = substr($set->name, 0, 42)."...";
                }

                Workshop::insert([
                    "bengkel_name" => $set->name ?? "Nama tidak tersedia",
                    "bengkel_alamat" => $set->vicinity ?? "Alamat tidak tersedia",
                    "bengkel_long" => $set->geometry->location->lng ?? 0.0,
                    "bengkel_lat" => $set->geometry->location->lat ?? 0.0,
                    "bengkel_status" => $set->business_status == "OPERATIONAL" ? 1 : 0,
                    "created_date" => new \DateTime('now'),
                    
                    # These LOCs need more brief.
                    "vehicle_type" => 3,
                    "bengkel_tipe" => 3
                ]);
            }else{
                Workshop
                    ::find($result_set->id)
                    ->update([
                    "bengkel_name" => $set->name ?? "Nama tidak tersedia",
                    "bengkel_alamat" => $set->vicinity ?? "Alamat tidak tersedia",
                    "bengkel_long" => $set->geometry->location->lng ?? 0.0,
                    "bengkel_lat" => $set->geometry->location->lat ?? 0.0,
                ]);
            }

            /**
             * Rating Formats
             */

            array_push($response_payload, 
                (object) [
                    "id" => rand(0, 10000000),
                    "workshop_name" => $set->name ?? "Nama tidak tersedia",
                    "workshop_address" => $set->vicinity ?? "Alamat tidak tersedia",
                    "lat" => $set->geometry->location->lat ?? 0.0,
                    "lng" => $set->geometry->location->lng ?? 0.0,
                    "rating" => 
                        $result_set->workshop_ratings
                        ?? number_format((float) 0, 1, '.', '')
                ]
            );
        }

        return BaseResponse::ok(
            $response_payload,
            "Success getting all datas from Google"
        );
    }
}
