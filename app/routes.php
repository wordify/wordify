<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');


// User routes
Route::get('user/{id}', function($id)
{
    return View::make('users.show')->with('userId', $id);
});

Route::get('users/create', function() 
{
	return View::make('users.create');
});

Route::post('login', 'UsersController@login');
Route::get('logout', 'UsersController@logout');
Route::post('/users/', array('before' => 'csrf', 'uses' => 'UsersController@store'));
Route::post('/getProfile', 'UsersController@getProfile');

// Login
Route::get('login/{provider}', 'OauthController@index');

// Post word
//Route::post('postWord', 'WordsController@store');

// Get new words
Route::post('getNewWords', 'WordsController@index');

// Resources
Route::resource('users', 'UsersController');
Route::resource('words', 'WordsController');
Route::resource('topics', 'TopicsController');
Route::resource('home', 'HomeController');