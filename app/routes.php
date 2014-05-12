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
	echo Hash::make('123456');
});

Route::get('admin', function()
{
	//if()
	return View::make('admin.login');
});

Route::post('login/{type}', 'UserController@login');
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
	Route::resource('role', 'RoleController');

	// Up/Down
	Route::post ('user/down/{id}',      'UserController@down');
	Route::post ('user/up/{id}',        'UserController@up');
	Route::post ('affiliate/down/{id}', 'AffiliateController@down');
	Route::post ('affiliate/up/{id}',   'AffiliateController@up');
	Route::post ('adminuser/down/{id}', 'AdminUserController@down');
	Route::post ('adminuser/up/{id}',   'AdminUserController@up');
});


/**
 * PUBLIC
 */
Route::group(array('prefix' => 'newmh'), function()
{
	Route::get('/', function(){
		return View::make('mundohablado.index');
	});



	// users in public app only are nor allowed to destroy themselves and see the other users
	Route::resource('user', 'UserController', array('except' => array('destroy')));
	Route::resource('affiliate', 'AffiliateController', array('except' => array('destroy')));

});


