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
    Route::get('/near-me', 'Api\WorkshopController@getWorkshopNearMe');
});

Route::group(["prefix" => "vehicle"], function(){
    Route::get('', 'Api\VehicleController@getVehicle');

    Route::get('/brands', 'Api\VehicleController@getMasterBrands');
});

Route::group(["prefix" => "google"], function(){
    Route::get('/get-workshop-near-me', 'Api\GoogleMapsController@getWorkshopNearMe');
});

Route::group(["prefix" => "booking"], function(){
    Route::post('', 'Api\BookingController@makeOrder');
});
