<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Logout
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

//Admin manager
Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
Route::get('/errors', 'AdminController@error404')->name('error404');
Route::get('/blank', 'AdminController@blank')->name('blank');
Route::get('/button', 'AdminController@button')->name('button');
Route::get('/card', 'AdminController@card')->name('card');
Route::get('/chart', 'AdminController@chart')->name('chart');
Route::get('/table', 'AdminController@table')->name('table');
Route::get('/forgot-password', 'AdminController@forgotpassword')->name('forgotpassword');
Route::get('/loginadmin', 'AdminController@loginadmin')->name('loginadmin');
Route::get('/signup', 'AdminController@register')->name('signup');
Route::get('/animation', 'AdminController@animation')->name('animation');
Route::get('/border', 'AdminController@border')->name('border');
Route::get('/color', 'AdminController@color')->name('color');
Route::get('/orther', 'AdminController@orther')->name('orther');


Route::resource('/chucvu','ChucvuController');
Route::post('/chucvu/create','ChucvuController@store');
Route::view('chuc_vu','Chuc_vu.index');
