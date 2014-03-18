<?php

class UserController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::whereRoleId(3)->paginate(5);
		return View::make('admin.users')->with('users', $users);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.users_create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input              = Input::all();
		$passwd             = substr(md5(rand()),0,8);
		$input['password']  = $passwd;
		$input['passwordv'] = $input['password'];
		$validator          = Validator::make($input, Rules::$createUserRules);

		if($validator->fails()) return Redirect::to('admin/user/create')->with('message', 'Error en el formulario')->withInput();
		else
		{
			echo "dhjaskhd";
			$user            = new User();
			$user->role_id   = 3;
			$user->username  = $input['username'];
			$user->password  = Hash::make($input['password']);
			$user->firstname = $input['firstname'];
			$user->lastname  = $input['lastname'];
			$user->email     = $input['email'];
			$user->phone     = $input['phone'];
			$user->cellphone = $input['cellphone'];
			$user->sex       = $input['sex'];
			$user->save();

			return Redirect::to('admin/user/'.$user->id)->with('message', 'Usuario creado exitosamente.');

			// TODO: Se manda el correo al usuario creado con su clave temporal.
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::whereId($id)->with('role')->first();

		if(!$user) return Redirect::to('admin/user');
		
		return View::make('admin.users_show')->with('user', $user);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::whereId($id)->with('role')->first();

		if(!$user) return Redirect::to('admin/user');
		
		return View::make('admin.users_edit')->with('user', $user);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();

		$rules = array(
			'firstname' => 'required|min:2|max:50',
			'lastname'  => 'required|min:2|max:50',
			'email'     => 'required|min:5|max:100|unique:users,email,'.$id,
			'phone'     => 'min:6|max:45|regex:/^\+?[0-9-()]+$/',
			'cellphone' => 'min:6|max:45|regex:/^\+?[0-9-()]+$/'
		);

		$validator = Validator::make($input, $rules);

		if($validator->fails()) return Redirect::to('admin/user/'.$id.'/edit')->with('message', 'Error en el formulario');
		else
		{
			$user = User::find($id);
			$user->firstname = $input['firstname'];
			$user->lastname  = $input['lastname'];
			$user->email     = $input['email'];
			$user->phone     = $input['phone'];
			$user->cellphone = $input['cellphone'];
			$user->sex       = $input['radioSex'];
			$user->touch();
			$user->save();

			return Redirect::to('admin/user/'.$id.'/edit')->with('message', 'Ha sido modificado el registro exitosamente');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


	/**
	 * Log a user in
	 *
	 * @return Response
	 */
	public function login()
	{
		$input = Input::all();

		$validator = Validator::make($input, Rules::$loginRules);
		
		if($validator->fails()) return Redirect::to('admin')->with('message', 'Fallo en inicio de sesion');
		else
		{
			$userdata = array('username' => $input['username'], 'password' => $input['password']);
			if (Auth::attempt($userdata))
			{
				//Auth::login(Auth::user());
				return Redirect::to('admin/home');
			}
			else
			{
				return Redirect::to('admin')->with('message', 'Fallo en inicio de sesion');
			}
		}

	}

	public function logout()
	{
		Auth::logout();
		return Redirect::to('admin');
	}
}