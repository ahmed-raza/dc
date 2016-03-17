<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as'=>'home', 'uses'=>'HomeController@index']);

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', 'HomeController@index');

    Route::group(['prefix' => 'user'], function () {
      Route::get('{id}', ['as'=>'profile', 'uses'=>'UserController@profile']);
      Route::get('{id}/ads', ['as'=>'user.ads', 'uses'=>'UserController@myAds']);
    });
    Route::resource('ad', 'AdsController');
});
