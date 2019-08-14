<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('rsvps', 'Api\RsvpController@index');
Route::get('rsvps/{rsvp}', 'Api\RsvpController@show');
Route::post('rsvps/attending/{rsvp}/{attending}', 'Api\RsvpController@attending');

 Route::get('laravel-send-email', 'EmailController@sendEMail');