<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    });

    //RESOURCE CONTROLLERS
    Route::resource('users', 'UsersController');
});

Route::controllers([
    'auth' => 'Auth\AuthController'
]);

Route::get('/', function () {
    return view('welcome');
});
