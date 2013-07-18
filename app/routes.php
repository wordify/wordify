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

Route::get('/', function()
{
	// Add userid session instead of 1
	$data = array('words' => array('Something', 'Super', 'Cool', 'Love it'));

	return View::make('home.index', $data);
});

Route::get('user', function($id)
{
    return View::make('users.show')->with('userId', $id);
});

Route::get('users/create', function() 
{
	return View::make('users.create');
});


Route::post('users/create', 'UsersController@store');


Route::resource('users', 'UsersController');
Route::resource('words', 'WordsController');
Route::resource('topics', 'TopicsController');