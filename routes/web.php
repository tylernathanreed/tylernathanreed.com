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

Route::get('about', [
    'as' => 'pages.about',
    'uses' => 'PagesController@about'
]);

Route::get('contact', [
    'as' => 'pages.contact',
    'uses' => 'PagesController@contact'
]);

Route::get('projects', [
    'as' => 'pages.projects',
    'uses' => 'PagesController@projects'
]);

Route::get('resume', [
    'as' => 'pages.resume',
    'uses' => 'PagesController@resume'
]);

Route::group(['prefix' => 'projects/quiz', 'namespace' => 'Quiz'], function() {

    // Index
    Route::get('/', [
        'as' => 'quiz.index',
        'uses' => 'QuizzesController@index'
    ]);

    // Detail
    Route::get('{quiz_template}', [
        'as' => 'quiz.show',
        'uses' => 'QuizzesController@show'
    ]);

    // Submission
    Route::post('{quiz_template}', [
        'as' => 'quiz.submit',
        'uses' => 'QuizzesController@handleSubmit'
    ]);

    // Results
    Route::get('{quiz_template}/results', [
        'as' => 'quiz.results',
        'uses' => 'QuizzesController@showResults'
    ]);

});

/*
Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false
]);

Route::get('dashboard', [
    'as' => 'dashboard.index',
    'uses' => 'DashboardController@index'
]);
*/