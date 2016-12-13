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
Route::get('user/activation/{token}', 'Auth\LoginController@activateUser')->name('user.activate');

Route::get('/', function () {
    $data = ['login' => 'login-container'];
    return view('auth.login', compact('data'));
});
Route::resource('portal', 'HomeController');

Route::group(['prefix' => 'portal'], function(){
  Route::resource('users', 'AdminUsersController', [
    'names'=> [
      'index' => 'portal.users.index',
      'create' => 'portal.users.create',
      'store' => 'portal.users.store',
      'update' => 'portal.users.update',
      'destroy' => 'portal.users.destroy',
      'show' => 'portal.users.show',
      'edit' => 'portal.users.edit',
    ]
  ]);

});
