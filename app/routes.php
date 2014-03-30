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
	return View::make('admin.home');
});

Route::get('test', function()
{ 
	echo Utils::encode_id(4354365784369, array('darwing', 'darwing@hotmail.com')).'<br>';
	echo Utils::decode_id('ZGYzMWI5MTZlNzJjMDlmMzA2YzkwZjgzNzc0ZDY2ZWY0MzU0MzY1Nzg0MzY5MjBiNmZhZjU3YzY1ZGRhMGRkNTk0MTgzOWFlNjFmMDY=');
});

Route::get('admin', function()
{
	//if()
	return View::make('admin.login');
});

Route::post('login', 'UserController@login');
Route::get('logout', 'UserController@logout');


/**
 * RESTFUL RESOURCE CONTROLLERS
 */

// TODO: Try to put public and admin (or the common between them) into a group

/**
 * ADMIN
 */
Route::group(array('prefix' => 'admin'), function()
{
	Route::resource('user', 'UserController');
	Route::resource('affiliate', 'AffiliateController');
});


/**
 * PUBLIC
 */
Route::group(array('prefix' => 'newmh'), function()
{
	// users in public app only are nor allowed to destroy themselves and see the other users
	Route::resource('user', 'UserController', array('except' => array('index', 'destroy')));
});


