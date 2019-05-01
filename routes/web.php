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

Route::get('/', [
	'as' => 'pages.index',
	'uses' => 'PagesController@index'
]);

Route::get('resume', [
	'as' => 'pages.resume',
	'uses' => 'PagesController@resume'
]);

Auth::routes([
	'register' => false,
	'reset' => false,
	'verify' => false
]);

Route::get('dashboard', [
	'as' => 'dashboard.index',
	'uses' => 'DashboardController@index'
]);
