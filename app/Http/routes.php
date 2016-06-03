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
	// Generic Pages
	Route::get('/', array(
		'as' 	=> 'pages.home',
		'uses' 	=> 'PagesController@resume'
	));

	Route::get('/resume', array(
		'as' 	=> 'pages.resume',
		'uses' 	=> 'PagesController@resume'
	));

	Route::get('/test', array(
		'as' 	=> 'pages.test',
		'uses' 	=> 'PagesController@test'
	));

	Route::get('/modal', array(
		'as' 	=> 'pages.modal',
		'uses' 	=> 'PagesController@modal'
	));

	Route::get('/sliders', function() {
		return view('pages.sliders');
	});

	Route::get('/skills', function() {
		return view('models.skills.show');
	});

	// Authentication Routes
	Route::group(['prefix' => 'auth'], function() {
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

	// Project Routes
	Route::group(['prefix' => 'projects'], function() {
		Route::get('game-of-life', array(
			'as' 	=> 'projects.game-of-life',
			'uses' 	=> 'ProjectsController@gameOfLife'
		));
	});

	// Dashboard Routes
	Route::group(['prefix' => 'dashboard'], function()
	{
		Route::get('/', array(
			'as' 	=> 'dashboard',
			'uses' 	=> 'DashboardController@index'
		));

		Route::get('settings', array(
			'as' 	=> 'dashboard.settings',
			'uses' 	=> 'DashboardController@settings'
		));
	});

	/*
	|--------------------------------------------------------------------------
	| Models Namespace
	|--------------------------------------------------------------------------
	|
	| All Routes that handle Controllers associated with Models are registered
	| here. Every Controller referenced is under the 'Models' Namespace. It
	| should be noticed that this Route Group does not provide a prefix.
	|
	*/
	Route::group(['namespace' => 'Models'], function() {

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

		// Card Routes
		Route::group(['prefix' => 'cards'], function() {

			Route::get('/', array(
				'as' 	=> 'cards.index',
				'uses' 	=> 'CardsController@index'
			));

			Route::get('/{sport}', array(
				'as' 	=> 'cards.sport',
				'uses' 	=> 'CardsController@sport'
			));

			Route::get('/{sport}/create', array(
				'as' 	=> 'cards.create',
				'uses' 	=> 'CardsController@create'
			));

		});

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

		// Tag Routes
		Route::resource('tags', 'TagsController', array(
			'names' => array(
				'index' 	=> 'tags.index',
				'create' 	=> 'tags.create',
				'store' 	=> 'tags.store',
				'show' 		=> 'tags.show',
				'edit' 		=> 'tags.edit',
				'update' 	=> 'tags.update',
				'destroy' 	=> 'tags.destroy'
			)
		));

		// Transaction Routes
		Route::resource('transactions', 'TransactionsController', array(
			'names' => array(
				'index' 	=> 'transactions.index',
				'create' 	=> 'transactions.create',
				'store' 	=> 'transactions.store',
				'show' 		=> 'transactions.show',
				'edit' 		=> 'transactions.edit',
				'update' 	=> 'transactions.update',
				'destroy' 	=> 'transactions.destroy'
			)
		));
	});
});