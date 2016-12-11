<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
Route::get('/password', function () {
    $data = ['login' => 'login-container'];
    return view('auth.passwords.email', compact('data'));
});
*/
Auth::routes();

Route::get('/', function () {
    $data = ['login' => 'login-container'];
    return view('auth.login', compact('data'));
});
Route::resource('portal', 'HomeController');
