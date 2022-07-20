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


// api per numero di recensioni e media voti
Route::get('/filter', 'Api\DoctorController@filter' );
//api show dottori
Route::get('/doctors/{id}', 'Api\DoctorController@show');
//api tutti i dottori per specializzazioni
Route::get('/doctors', 'Api\DoctorController@getAllDoctors');
//api per index specializzazioni
Route::get('/specializations', 'Api\SpecializationController@index');
//api tutte le recensioni
Route::get('/reviews', 'Api\ReviewController@index');
//store recensioni
Route::post('/reviews', 'Api\ReviewController@store');
//index messaggi
Route::get('/messages','Api\MessageController@index');
//store per messaggi
Route::post('/messages','Api\MessageController@store');
//dottori sponsorizzati
Route::get('/doctors-sponsorized', 'Api\DoctorController@sponsorized');




