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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//User
Route::resource('/users', 'UsersController');
Route::get('/users/block/{id}', 'UsersController@block')->name('users.block');
Route::get('/usersAjax', 'UsersController@showUserAjax');
Route::get('/trash-users', 'UsersController@getSoftDeletes')->name('users.trash');
Route::get('/users/restore/{id}', 'UsersController@restore')->name('users.restore');
Route::get('/users/delete/{id}', 'UsersController@delete')->name('users.delete');

Route::group(['prefix' => '/factor-salary'], function () {
    Route::view('/', 'factor_salaries.index')->name('factor.salary');
    Route::resource('/index', 'BacLuongController')->parameter('index', 'id')->names('fs');
    Route::get('/delete/{id}', 'BacLuongController@delete')->name('fs.delete');
    Route::get('/restore/{id}', 'BacLuongController@restore')->name('fs.restore');
});

Route::group(['prefix' => '/role'], function () {
    Route::view('/view', 'Role.list');
    Route::resource('/', 'RolesController')->names('role')->parameter('','id');
    Route::get('trash','RolesController@getSoftDeletes')->name('role.trash');
    Route::get('/role/restore','RolesController@restore')->name('role.restore');
});
