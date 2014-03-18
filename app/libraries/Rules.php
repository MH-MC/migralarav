<?php

class Rules
{
	static $loginRules = array(
		'username' => 'required', 
		'password' => 'required'
	);

	static $createUserRules = array(
		'username'  => 'required|min:4|max:25|unique:users,username', 
		'password'  => 'required', 
		'passwordv' => 'required|same:password', 
		'firstname' => 'required|min:2|max:50', 
		'lastname'  => 'required|min:2|max:50', 
		'email'     => 'required|min:5|max:100|unique:users,email', 
		'phone'     => 'min:6|max:45|regex:/^\+?[0-9-()]+$/', 
		'cellphone' => 'min:6|max:45|regex:/^\+?[0-9-()]+$/', 
		'sex'       => 'required'
	);

}