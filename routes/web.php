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
Route::group(['middleware' => ['web']], function () {
	Route::view('/', 'auth.register');
	Route::view('/login', 'auth.login')->middleware('guest');
	Route::view('/register', 'auth.register')->middleware('guest');

	Route::group(['namespace' => 'Auth'], function () {
		Route::post('/register', 'RegisterController@create');
		Route::post('/login', 'LoginController@login');
	});
});
