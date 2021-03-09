<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
use Log;

/**
 * ApiHandler
 * A guzzle instance that apply Authorization method like
 * Authorization Bearer token
 */
abstract class ApiHandler{

    protected function request($method, $uri, $params = [], $token = null){
        $client = new Client();
        $options = [];

        if(!empty($params)){

            if($method == "GET"){
                $options["headers"] = [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'
                ];

                $options["query"] = $params; 
            }else{
                $options["headers"] = [
                    'Content-Type' => 'application/json',
                    'Accept' => '*/*'
                ];

                $options["json"] = $params;
            }

        }

        if($token != null){
            $options["headers"]["Authorization"] = $token;
        }

        try{
            $response = $client->request(
                strtoupper($method),
                $uri,
                $options
            );

            Log::alert('REQUEST_INFO: \n\n URI: '.$uri.'\n\n Body: '.json_encode($params));
            Log::alert('REQUEST_RESPONSE: '.json_encode((string) $response->getBody()));
            
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
}