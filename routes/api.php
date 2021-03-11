<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function() {
    return response()->json(
        [
            "status" => true,
            "code" => 200,
            "message" => "Oper Workshop",
            "data" => [
                "app" => env('APP_URL'),
                "app_time_zone" => date_default_timezone_get(),
                "time" => date('D, m Y H:i:s', strtotime('now'))
            ]
        ]
    );
});

Route::group([
        "prefix" => "auth"
    ], function(){
        Route::post('login', 'Api\AuthController@authentication');
        
        Route::post('send-otp', 'Api\AuthController@sendOTP');
    });

Route::group([
    "prefix" => "user"
], function(){
    Route::get('', 'Api\UserController@getUserByPhone');
});

Route::group(["prefix" => "workshop"], function(){
    Route::get('', 'Api\WorkshopController@getWorkshopByType');
    Route::get('/near-me', 'Api\WorkshopController@saveWorkshopNearMe');
    Route::get('/by-batch-id', 'Api\WorkshopController@getNearbyWorkshopByBatchId');
});

Route::group(["prefix" => "vehicle"], function(){
    Route::get('', 'Api\VehicleController@getVehicle');

    Route::get('/brands', 'Api\VehicleController@getMasterBrands');
});

Route::group(["prefix" => "google"], function(){
    Route::get('/get-workshop-near-me', 'Api\GoogleMapsController@getWorkshopNearMe');
});

Route::group(["prefix" => "booking"], function(){
    Route::get('', 'Api\BookingController@checkCurrentBooking');
    Route::post('', 'Api\BookingController@makeOrder');
});

Route::group(["middleware" => "utilities", "prefix" => "utilities"], function(){
    Route::get('/token', 'Api\UtilitiesController@getOperTaskToken');
});
