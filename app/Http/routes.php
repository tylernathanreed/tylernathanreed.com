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


Route::group(['middleware' => 'web'], function()
{
	Route::get('/', array(
		'as' 	=> 'pages.home',
		'uses' 	=> 'PagesController@home'
	));

	Route::get('/resume', array(
		'as' 	=> 'pages.resume',
		'uses' 	=> 'PagesController@resume'
	));

	// Authentication Routes
	Route::group(['prefix' => 'auth'], function()
	{
		// Login and Logout Routes
		Route::get('login', array(
			'as' 	=> 'auth.login',
			'uses' 	=> 'Auth\AuthController@showLoginForm'
		));

		Route::post('login', array(
			'as' 	=> 'auth.login.submit',
			'uses' 	=> 'Auth\AuthController@login'
		));

		Route::get('logout', array(
			'as' 	=> 'auth.logout',
			'uses' 	=> 'Auth\AuthController@logout'
		));

		// Registration Routes
		Route::get('register', array(
			'as' 	=> 'auth.register',
			'uses' 	=> 'Auth\AuthController@showRegistrationForm'
		));

		Route::post('register', array(
			'as' 	=> 'auth.register.submit',
			'uses' 	=> 'Auth\AuthController@register'
		));

		// Password Reset Routes
		Route::get('password/reset/{token?}', array(
			'as' 	=> 'auth.reset',
			'uses' 	=> 'Auth\PasswordController@showResetForm'
		));

		Route::post('password/reset', array(
			'as' 	=> 'auth.reset.submit',
			'uses' 	=> 'Auth\PasswordController@reset'
		));

		Route::post('password/email', array(
			'as' 	=> 'auth.email',
			'uses' 	=> 'Auth\PasswordController@postEmail'
		));
	});

	// Article Routes
	Route::resource('articles', 'ArticlesController', array(
		'names' => array(
			'index' 	=> 'articles.index',
			'create' 	=> 'articles.create',
			'store' 	=> 'articles.store',
			'show' 		=> 'articles.show',
			'edit' 		=> 'articles.edit',
			'update' 	=> 'articles.update',
			'destroy' 	=> 'articles.destroy'
		)
	));

	// Role Routes
	Route::resource('roles', 'RolesController', array(
		'names' => array(
			'index' 	=> 'roles.index',
			'create' 	=> 'roles.create',
			'store' 	=> 'roles.store',
			'show' 		=> 'roles.show',
			'edit' 		=> 'roles.edit',
			'update' 	=> 'roles.update',
			'destroy' 	=> 'roles.destroy'
		)
	));

	// Permission Routes
	Route::resource('permissions', 'PermissionsController', array(
		'names' => array(
			'index' 	=> 'permissions.index',
			'create' 	=> 'permissions.create',
			'store' 	=> 'permissions.store',
			'show' 		=> 'permissions.show',
			'edit' 		=> 'permissions.edit',
			'update' 	=> 'permissions.update',
			'destroy' 	=> 'permissions.destroy'
		)
	));

	Route::get('/dashboard', array(
		'as' 	=> 'dashboard',
		'uses' 	=> 'DashboardController@index'
	));
});