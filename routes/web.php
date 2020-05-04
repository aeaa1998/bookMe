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

// Route::view('/', 'auth.login');
Route::group(['middleware' => 'guest'], function () {
	Route::view('/login', 'auth.login')->name('login');
	Route::view('/register', 'auth.register')->name('register');
});

Route::group(['namespace' => 'Auth'], function () {
	Route::post('/register', 'RegisterController@create');
	Route::post('/login', 'LoginController@login');
	Route::get('/logout', 'LoginController@logout');
});

Route::group(['middleware' => 'auth'], function () {
	Route::view('/sales', 'dashboard.sales');
	Route::view('/rent', 'dashboard.rent');
	Route::view('/home', 'dashboard.home');
});
