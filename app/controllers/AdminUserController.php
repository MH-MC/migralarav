<?php

class AdminUserController extends BaseController {

	// TODO: the same admin user cannot modify her/him self
	// TODO: Cannot create/edit admin users with major privilegies
	// 
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$roles  = Role::where('role_id', '>', 0)->select('id')->get();
		$ids = array();

		foreach ($roles as $role) 
			array_push($ids, $role->id);

		$users = User::whereIn('role_id', $ids)->paginate(15);
		return View::make('admin.admin.index')->with('users', $users);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$roles  = Role::where('role_id', '>', 0)->get();
		return View::make('admin.admin.create')->with('roles', $roles);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// TODO: Role_id exists
		$input              = Input::all();
		$passwd             = substr(md5(rand()),0,8);
		$input['password']  = $passwd;
		$input['passwordv'] = $input['password'];

		$validator = Validator::make($input, Rules::$createAdminUserRules, Rules::$customErrorMessages);

		if($validator->fails()) return Redirect::to('admin/adminuser/create')->withErrors($validator)->withInput();
		else
		{
			$user            = new User();
			$user->role_id   = Utils::decode_id($input['role']);
			$user->username  = $input['username'];
			$user->password  = Hash::make($input['password']);
			$user->firstname = $input['firstname'];
			$user->lastname  = $input['lastname'];
			$user->email     = $input['email'];
			$user->sex       = $input['sex'];
			$user->save();

			return Redirect::to('admin/adminuser/'.Utils::encode_id($user->id, array($user->username, $user->email)))->with('message', 'Administrador creado exitosamente.');

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

		if(!$user) return Redirect::to('admin/adminuser');
		
		return View::make('admin.admin.show')->with('user', $user);
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

		if(!$user) return Redirect::to('admin/adminuser');

		$roles  = Role::where('role_id', '>', 0)->get();
		
		return View::make('admin.admin.edit')->with('user', $user)->with('roles', $roles);
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
			'sex'       => 'required'
		);

		$validator = Validator::make($input, $rules, Rules::$customErrorMessages);

		if($validator->fails()) return Redirect::to('admin/adminuser/'.$id.'/edit')->withErrors($validator)->withInput();
		else
		{
			$user = User::find($temp_id);
			$user->role_id   = Utils::decode_id($input['role']);
			$user->firstname = $input['firstname'];
			$user->lastname  = $input['lastname'];
			$user->email     = $input['email'];
			$user->sex       = $input['sex'];
			$user->touch();
			$user->save();

			// TODO: It should send a notification to the new email
			// TODO: Regenerate password logic

			return Redirect::to('admin/adminuser/'.$id.'/edit')->with('message', 'Ha sido modificado el registro exitosamente');
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

		return Redirect::to('admin/adminuser')->with('message', 'Administrador eliminado exitosamente.')->with('type', 'success');
	}

	public function down($id)
	{
		$id   = Utils::decode_id($id);
		$user = User::find($id);

		if(is_object($user))
		{
			$user->active = 0;
			$user->touch();
			$user->save();
		}

		return Redirect::to('admin/adminuser')->with('message', 'Administrador deshabilitado exitosamente.')->with('type', 'success');;
	}

	public function up($id)
	{
		$id   = Utils::decode_id($id);
		$user = User::find($id);

		if(is_object($user))
		{
			$user->active = 1;
			$user->touch();
			$user->save();
		}

		return Redirect::to('admin/adminuser')->with('message', 'Administrador habilitado exitosamente.')->with('type', 'success');;
	}

}