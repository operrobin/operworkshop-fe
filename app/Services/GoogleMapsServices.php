<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
use Log;

class GoogleMapsServices {

    private function googleMapsCallback($method, $uri, $params = []){
        $client = new Client();
        $options = [];
        $uri = env('GOOGLE_MAPS_API_URI').$uri;

        # If params not empty, prepare the method
        if(!empty($params))
            switch($method){
                case "GET": 
                    $options["headers"] = [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json'
                    ];

                    $options["query"] = $params; 
                    break;

                default: 
                    $options["headers"] = [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json'
                    ];

                    $options["json"] = $params;
            }

        /**
         * API Key
         */
        $options["query"] += [
            "key" => env('GOOGLE_MAPS_APP_KEY')
        ];

        try{
            $response = $client->request(
                strtoupper($method),
                $uri,
                $options
            );
            Log::alert('REQUEST_INFO: \n\n URI: '.$uri.'\n\n Body: '.json_encode($params));

            return json_decode((string) $response->getBody());
        }catch(RequestException $e){
            $response = $e->getResponse();

            // Logging error
            Log::alert('REQUEST_INFO: \n\n URI: '.$uri.'\n\n Body: '.json_encode($params));
            Log::alert('ERROR_REQUEST: '.Psr7\str($e->getRequest()));
            Log::alert('ERROR_RESPONSE: '.json_encode($e->getResponse()));
            Log::alert('ERROR: '. json_encode($e->getMessage()));

            return json_decode(
                [
                    "code" => $e->getResponse()->getStatusCode() ?? "",
                    "message" => $e->getResponse()->getReasonPhrase() ?? ""
                ]
            );
        }
    }

    public function searchNearbyWorkshop($lat, $lng){
        return $this->googleMapsCallback(
            "GET",
            "/place/nearbysearch/json",
            [
                "location" => $lat.",".$lng,
                "radius" => env('GOOGLE_MAPS_SEARCH_NEARBY_RADIUS_SETTING'),
                "type" => "car_repair"
            ]
        );
    }

    /**
     * distanceMatrix
     * A service to count distance between 2 coordinates
     * 
     * @link https://developers.google.com/maps/documentation/distance-matrix/overview
     * 
     * @param object from
     *  Start point long lat object. This object must have these attributes below:
     *      @param double lat
     *      @param double lng
     * 
     * @param object to
     *  End point long lat object. This object must have these attributes below:
     *      @param double lat
     *      @param double lng
     * 
     * In case you wanna test something:
     * -6.3889885,106.9950572
     * 
     * @return double distance
     */
    public function distanceMatrix($from, $to){

        return $this->googleMapsCallback(
            "GET",
            "/distancematrix/json",
            [
                "origins" => $from->lat.",".$from->lng,
                "destinations" => $to->lat.",".$to->lng
            ]
        );
    }
    
    public function check($ray){

        return $this->googleMapsCallback(
            "GET",
            "/distancematrix/json",
            $ray
        );
    }
}
