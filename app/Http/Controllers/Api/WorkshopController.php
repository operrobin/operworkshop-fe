<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\DataTransferObject\BaseResponse;

use App\Helper\ManualPaginationHelper;

use App\Model\Workshop;
use App\Model\NoSQL\NearbyWorkshop;

use DB;

use App\Services\GoogleMapsServices;

class WorkshopController extends Controller
{
    const KM_TO_METER = 1000;

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
     * saveWorkshopNearMe
     * An API to get Workshop by it's radius location.
     * And caching it with inside MongoDB server.
     * 
     * @see \App\Model\Workshop for more details
     * @see \App\Model\NoSQL\NearbyWorkshop 
     * 
     * @param double lat
     * @param double lng
     * 
     * @return integer last_batch
     */
    public function saveWorkshopNearMe(Request $request){
        $v = validator()->make($request->all(), [
            "lat" => "required",
            "lng" => "required"
        ]);

        if($v->fails()){
            return BaseResponse::error($v->getMessageBag()->first(), 500);
        }

        $google = new GoogleMapsServices();

        $resultSet = Workshop::with('setting')->get();

        /**
         * Generate batch that will be returned.
         * If data not exist, return 0.
         */
        $batch_id = (int) (NearbyWorkshop::orderBy('batch_id', 'desc')->get()->first()->batch_id ?? 0);


        /**
         * Check if NearbyWorkshop is already exists with this latlng thingy
         */
        $nearby_workshop = NearbyWorkshop
                        ::where('user_lat_lng', "{$request->get('lat')}, {$request->get('lng')}")
                        ->where('created_at', '>', date(strtotime('-30 days')))
                        ->get()
                        ->first();

        if($nearby_workshop){
            $batch_id = $nearby_workshop->batch_id;
        }else{

            /**
             * If user_lat_lng is not found, create new one.
             */
            foreach($resultSet as $set){

                if(isset($set->setting)){
                    $distance = (double) (
                        $google->distanceMatrix(
                            (object) [
                                "lat" => $request->get('lat'),
                                "lng" => $request->get('lng')
                            ],
                            (object) [
                                "lat" => $set->bengkel_lat,
                                "lng" => $set->bengkel_long
                            ]
                        )->rows[0]->elements[0]->distance->value / 1000
                    );
        
        
                    if($distance > (double) env('GOOGLE_MAPS_SEARCH_NEARBY_RADIUS_SETTING') 
                        || $distance > ($set->setting->maks_jarak / self::KM_TO_METER)){
                        continue;
                    }
        
                    /**
                     * Precaching NearbyWorkshop to MongoDB
                     */
                    $workshop = new NearbyWorkshop();
                    $workshop->batch_id = ($batch_id + 1);
                    $workshop->user_lat_lng = "{$request->get('lat')}, {$request->get('lng')}";
                    $workshop->workshop_id = $set->id;
                    $workshop->distance = $distance;
                    $workshop->created_at = new \DateTime('now');
                    $workshop->save();
                }
            }

            $batch_id = $batch_id + 1;
        }

        return BaseResponse::ok(
            (object) [
                "batch_id" => ($batch_id)
            ],
            "Succesfully saved "
        );
    }

    /**
     * getNearbyWorkshopByBatchId
     * An API to get Workshop by it's `batch_id`
     * 
     * @param integer batch_id
     * @param integer bengkel_type
     * @param integer vehicle_type
     * 
     * @return array \App\Model\Workshop::class
     */
    public function getNearbyWorkshopByBatchId(Request $request){
        $v = validator()->make($request->all(), [
            "batch_id" => "required",
            "bengkel_type" => "required",
            "vehicle_type" => "required"
        ]);

        if($v->fails()){
            return BaseResponse::error($v->getMessageBag()->first(), 500);
        }

        $batch_id = (int) $request->get('batch_id');

        /**
         * Bug on Jenssegers\MongoDB.
         * Where id must be put as (int)
         */
        $nearby_workshop_dataset = NearbyWorkshop
                                    ::where('batch_id', $batch_id)
                                    ->get();

        $ids = [];

        foreach($nearby_workshop_dataset as $set){
            array_push($ids, $set->workshop_id);
        }

        return BaseResponse::ok(
            Workshop
                ::whereIn('id', $ids)
                ->where('bengkel_tipe', $request->get('bengkel_type'))
                ->where('vehicle_type', $request->get('vehicle_type'))
                ->with('setting')
                ->get(), 
            "Success getting all workshop datas"
        );
    }
}
