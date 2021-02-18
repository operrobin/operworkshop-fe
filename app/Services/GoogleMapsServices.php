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
}
