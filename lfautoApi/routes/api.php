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
Route::get('dmdfr', 'API\DmdficherepController@index');
Route::put('dmdfr', 'API\DmdficherepController@update');
Route::post('dmdfr', 'API\DmdficherepController@store');
Route::post('pai', 'API\PaimentController@store');
Route::get('pai', 'API\PaimentController@index');
