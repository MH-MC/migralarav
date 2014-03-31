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
	$roles  = Role::where('role_id', '>', 0)->select('id')->get();
	$ids = array();

	foreach ($roles as $role) 
		array_push($ids, $role->id);

	$users = User::whereIn('role_id', $ids)->get();
	return View::make('admin.admin.index')->with('users', $users);
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
	Route::resource('adminuser', 'AdminUserController');
});


/**
 * PUBLIC
 */
Route::group(array('prefix' => 'newmh'), function()
{
	// users in public app only are nor allowed to destroy themselves and see the other users
	Route::resource('user', 'UserController', array('except' => array('index', 'destroy')));
	Route::resource('affiliate', 'AffiliateController', array('except' => array('index', 'destroy')));

});


