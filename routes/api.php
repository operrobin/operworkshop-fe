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

Route::group(["prefix" => "workshop"], function(){
    Route::get('', 'Api\WorkshopController@getWorkshopByType');
});

Route::group(["prefix" => "vehicle"], function(){
    Route::get('', 'Api\VehicleController@getVehicle');

    Route::get('/type', 'Api\VehicleController@getVehicleTypes');
});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

