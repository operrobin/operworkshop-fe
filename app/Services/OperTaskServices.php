<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
use Log;

class OperTaskServices extends ApiHandler {

    const BASE_TOKEN = "Bearer ";


    /**
     * getOrderByIdOrder
     * @param string idorder
     *      Reference to table booking_order_info on
     *      `oper_task_order_id`
     */
    public function getOrderByIdOrder($idorder, $token){
        return $this->request(
            "GET",
            env('OPERTASK_API_BASE_URL')."/order/{$idorder}",
            null,
            self::BASE_TOKEN.$token
        );
    }


    /**
     * getOrderByBookingNo
     * @param string booking_no
     *      Reference to table booking_order_info on
     *      `oper_task_trx_id`
     */
    public function getOrderByBookingNo($booking_no, $token){
        return $this->request(
            "GET",
            env('OPERTASK_API_BASE_URL')."/order/show/{$booking_no}",
            null,
            self::BASE_TOKEN.$token
        );
    }

    /**
     * sendOrder
     * @method POST
     * A service to create order in OperTask API.
     * 
     * 
     * @param object request
     *      This Object 
     *      @param string task_template_id
     *      @param string booking_time
     *          string date time with format Y-m-d H:i:s
     *      @param string origin_latitude
     *          string from double origin_latitude
     *      @param string origin_longitude
     *          string from double origin_longitude
     *      @param string destination_latitude
     *          string from double destination_latitude
     *      @param string destination_latitude
     *          string from destination_latitude
     *      @param string user_fullname
     *      @param string user_phonenumber
     *      @param string vehicle_owner
     *      @param string vehicle_brand_id
     *          Reference to Master Brand
     *      @param string vehicle_type
     *          Vehicle name e.g. "Fortuner 2014"
     *      @param string vehicle_transmission
     *          For some reason always return CVT
     *      @param string client_vehicle_license
     *          Plat
     *      @param string message
     * 
     * @param string token 
     */
    public function sendOrder($request, $token){
        return $this->request(
            "POST",
            env('OPERTASK_API_BASE_URL')."/order",
            $request,
            self::BASE_TOKEN.$token
        );
    }

    /**
     * login
     * A service to get token from Oper Task Rest API
     */
    public function login(){
        return $this->request(
            "POST",
            env('OPERTASK_API_BASE_URL')."/login",
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

    public function cancelOrder($id, $reason, $token){
        return $this->request(
            "POST",
            env('OPERTASK_API_BASE_URL')."/order/cancelorder",
            [ 
                "idorder" => $id,
                "reason_cancel" => $reason
            ],
            self::BASE_TOKEN.$token
        );

        
    }
}