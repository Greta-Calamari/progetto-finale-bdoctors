<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Auth::routes();

Route::middleware('auth')
       ->namespace('Admin')
       ->name('admin.')
       ->prefix('admin')
       ->group(function(){
              Route::get('/', 'HomeController@index')->name('home');
              Route::resource('/doctors', 'DoctorController');      
              Route::resource('/sponsors', 'SponsorController');        
              Route::resource('/users', 'UserController');   
              //sponsors
              Route::get('/checkout/{type}', 'SponsorController@token')->name('sponsor.pay'); 
              Route::post('/checkout/{price}', 'SponsorController@process')->name('sponsor.process');
            


});
// home route 
Route::get("{any?}",function(){
    return view("guest.home");
})->where("any",".*");
