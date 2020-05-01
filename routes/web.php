<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

//->middleware('password.confirm');
//->middleware('verified');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

//Log in with google and facebook account
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

//Reset password
Route::post('reset-password', 'ResetPasswordController@sendMail');
Route::put('reset-password/{token}', 'ResetPasswordController@reset')->name('reset.password');

//Logout
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');