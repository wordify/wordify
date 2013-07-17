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
	return View::make('master');
});

Route::get('user/{id}', function($id)
{
    return View::make('users.show')->with('userId', $id);
});

Route::resource('users', 'UsersController');

Route::resource('words', 'WordsController');
