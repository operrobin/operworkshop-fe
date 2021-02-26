<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
use Log;

class OperTaskServices {
    private function operRestCallback($method, $uri, $params = [], $token = null){
        $client = new Client();
        $options = [];
        $uri = env('OPERTASK_API_BASE_URL').$uri;


        if(!empty($params)){
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
        }

        if($token != null){
            $options["headers"]["Authorization"] = "Bearer ".$token;
        }

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
            Log::alert('REQUEST_INFO: \n\n URI: '.$uri.'\n\n Headers: '.json_encode($options));
            Log::alert('REQUEST_BODY: '.json_encode($params));
            Log::alert('ERROR_REQUEST: '.Psr7\str($e->getRequest()));
            Log::alert('ERROR_RESPONSE: '.json_encode($e->getResponse()));
            Log::alert('ERROR: '. json_encode($e->getMessage()));

            return json_decode(
                json_encode([
                    "code" => $e->getResponse()->getStatusCode() ?? "",
                    "message" => $e->getResponse()->getReasonPhrase() ?? ""
                ])
            );
        }
    }

    public function sendOrder($request, $token){
        return $this->operRestCallback(
            "GET",
            "/order",
            $request,
            $token
        );
    }

    public function login(){
        return $this->operRestCallback(
            "POST",
            "/login",
            [
                "username" => env('OPERTASK_EMAIL'),
                "password" => env('OPERTASK_PASSWORD'),
                "client_secret" => env('OPERTASK_CLIENT_SECRET'),
                "client_id" => env('OPERTASK_CLIENT_ID'),
                "grant_type" => env('OPERTASK_GRANT_TYPE'),
                "scope" => env('OPERTASK_SCOPE'),
                "domain" => env('OPERTASK_DOMAIN')
            ]
        );
    }
}