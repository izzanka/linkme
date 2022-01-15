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



Auth::routes();

Route::get('/','HomeController@index')->name('home');
Route::post('/visit/{link}','VisitController@store')->name('visit.link');

Route::get('/{user}','UserController@show')->name('user.show');

Route::group(['middleware' => 'auth','prefix' => 'dashboard'], function(){
    // Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('links','LinkController');

    Route::get('/settings','UserController@edit')->name('settings.edit');
    Route::post('/settings','UserController@update')->name('settings.update');
    Route::post('/profile/{id}','UserController@update_profile')->name('profile.update');
    Route::post('/profile','UserController@update_password')->name('password.update');
});




