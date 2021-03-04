<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PageController@splashScreen');

Route::get('/intro', 'PageController@introductionScreen');

/**
 * Main Functions
 */

Route::get('/authenticate', 'PageController@authenticateScreen');

Route::get('/booking', 'PageController@bookingScreen');

Route::group(["prefix" => "booking-status"], function(){
    Route::get('/status/{booking_uri}', 'BookingStatusController@bookingStatusScreen');
    Route::get('/message', 'BookingStatusController@statusFallback');
});


Route::post('/set-web-session', 'CrossSessionController@setWebSession');
