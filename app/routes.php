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
	return View::make('hello');
});

Route::get('admin/home', function()
{
	return View::make('adminhome');
});

Route::get('test', function()
{ 
	echo Hash::make('mundohablado123');
});

Route::get('admin', function()
{
	return View::make('admlogin');
});

Route::post('login', 'UserController@login');


/**
 * RESTFUL RESOURCE CONTROLLERS
 */

Route::resource('user', 'UserController');