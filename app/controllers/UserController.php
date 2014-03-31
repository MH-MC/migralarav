<?php

class UserController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		/*if (Request::is('admin/*'))
		{
			echo "estoy en admin";
		}
		else if(Request::is('newmh/*'))
		{
			echo "estoy en public";
		}else echo "404";*/

		$role  = Role::whereName('miembro')->first();
		$users = User::whereRoleId($role->id)->paginate(15);

		return View::make('admin.user.index')->with('users', $users);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.user.create');
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
		$validator          = Validator::make($input, Rules::$createUserRules, Rules::$customErrorMessages);

		if($validator->fails()) return Redirect::to('admin/user/create')->withErrors($validator)->withInput();
		else
		{
			$user            = new User();
			$user->role_id   = Role::whereName('miembro')->first()->id;
			$user->username  = $input['username'];
			$user->password  = Hash::make($input['password']);
			$user->firstname = $input['firstname'];
			$user->lastname  = $input['lastname'];
			$user->email     = $input['email'];
			$user->phone     = $input['phone'];
			$user->cellphone = $input['cellphone'];
			$user->sex       = $input['sex'];
			$user->save();

			return Redirect::to('admin/user/'.Utils::encode_id($user->id, array($user->username, $user->email)))->with('message', 'Usuario creado exitosamente.');

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
		$id = Utils::decode_id($id);
		$user = User::whereId($id)->with('role')->first();

		if(!$user) return Redirect::to('admin/user');
		
		return View::make('admin.user.show')->with('user', $user);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$id = Utils::decode_id($id);
		$user = User::whereId($id)->with('role')->first();

		if(!$user) return Redirect::to('admin/user');
		
		return View::make('admin.user.edit')->with('user', $user);
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
		$temp_id = Utils::decode_id($id);

		$rules = array(
			'firstname' => 'required|min:3|max:50|regex:/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.\'-]+$/u', 
			'lastname'  => 'required|min:3|max:50|regex:/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.\'-]+$/u', 
			'email'     => 'required|min:6|max:50|regex:/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/|unique:users,email,'.$temp_id, 
			'phone'     => 'min:6|max:45|regex:/^\+?[0-9-()]+$/', 
			'cellphone' => 'min:6|max:45|regex:/^\+?[0-9-()]+$/',
			'sex'       => 'required'
		);

		$validator = Validator::make($input, $rules, Rules::$customErrorMessages);

		if($validator->fails()) return Redirect::to('admin/user/'.$id.'/edit')->withErrors($validator)->withInput();
		else
		{
			$user = User::find($temp_id);
			$user->firstname = $input['firstname'];
			$user->lastname  = $input['lastname'];
			$user->email     = $input['email'];
			$user->phone     = $input['phone'];
			$user->cellphone = $input['cellphone'];
			$user->sex       = $input['sex'];
			$user->touch();
			$user->save();

			// TODO: It should send a notification to the new email
			// TODO: Regenerate password logic

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
		$id = Utils::decode_id($id);
		// TODO: Borrar relaciones si existen
		$user = User::find($id);
		$user->delete();

		return Redirect::to('admin/user');
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