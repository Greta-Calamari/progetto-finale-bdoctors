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


Route::get('/messages','Api\MessageController@index');

Route::get("/doctors", [DoctorController::class, "index"]);
//api singolo dottore per slug
Route::get("/doctors/{slug}", [DoctorController::class, "show"]);
// api per numero di recensioni
Route::get('/filter', [DoctorController::class, 'filter'] );


Route::get('/specializations', 'Api\SpecializationController@index');
Route::get('/specializations/{id}', 'Api\SpecializationController@show');
Route::get('/reviews', 'Api\ReviewController@index');

