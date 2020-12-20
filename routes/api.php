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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::apiResource('article','Api\Article');

/**
 * µêÆÌ
 */
Route::apiResource('store','Api\Store');

Route::apiResource('user','Api\User')->except(['create', 'store', 'index']);

Route::namespace('Api')->prefix('user')->group(function(){
    Route::post('login','User@login');
});
