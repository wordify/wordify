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


// USE TO CALL A METHOD IN A CONTROLLER
//Route::get('/', 'UsersController@index');

Route::get('user/{id}', function($id)
{
    return View::make('users.show')->with('userId', $id);
});

Route::get('users/create', function() 
{
	return View::make('users.create');
});
Route::post('users/create', 'UsersController@store');


// Login
Route::post('login', 'UsersController@login');
Route::get('logout', 'UsersController@logout');



// Resources
Route::resource('users', 'UsersController');
Route::resource('words', 'WordsController');
Route::resource('topics', 'TopicsController');
Route::resource('home', 'HomeController');