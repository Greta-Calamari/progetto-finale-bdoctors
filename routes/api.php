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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });




Route::get('/doctors', 'Api\DoctorController@index');
Route::get('/doctors/{id}', 'Api\DoctorController@show');
Route::get('/specializations', 'Api\SpecializationController@index');
Route::post('/reviews', 'Api\ReviewController@store');
Route::get('/messages','Api\MessageController@index');
Route::post('/messages','Api\MessageController@store');
Route::get('/specializations/{id}', 'Api\SpecializationController@show');
Route::get('/reviews', 'Api\ReviewController@index');

