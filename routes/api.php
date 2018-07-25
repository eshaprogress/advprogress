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

Route::get('/donate', 'Website@indexWildCard');
Route::post('/donate', 'Website@donationSubmit');
Route::post('/consultation', 'Website@consultationSubmit');
Route::post('/cancel-subscription', 'Website@cancelSubscription');
Route::post('/cancel-subscription-confirmed', 'Website@confirmCancelSubscription');
Route::get('/legal', 'LegalController@legalIndex');