<?php

class RoleController extends \BaseController {

	// TODO: Just superadmin user can create/edit roles
	// TODO: No one can edit/delete superadmin role, neither superadmin users
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$roles  = Role::paginate(15);
		return View::make('admin.role.index')->with('roles', $roles);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$roles  = Role::all();
		return View::make('admin.role.create')->with('roles', $roles);;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$rules = array(
			'name'    => 'required|alpha_dash|min:3|max:45',
			'role_id' => 'exists:roles,id'
		);

		$input['role_id'] = Utils::decode_id($input['role_id']);

		$validator = Validator::make($input, $rules);

		if($validator->fails()) return Redirect::to('admin/role/create')->withErrors($validator)->withInput();
		else
		{
			$role          = new Role();
			$role->name    = $input['name'];
			$role->role_id = $input['role_id'];
			$role->save();

			return Redirect::to('admin/role/'.Utils::encode_id($role->id, array($role->name, $role->role_id)))->with('message', 'Rol creado exitosamente.');
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
		$id   = Utils::decode_id($id);
		$role = Role::whereId($id)->first();

		if(!is_object($role)) return Redirect::to('admin/role');
		
		return View::make('admin.role.show')->with('role', $role);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$id   = Utils::decode_id($id);
		$role = Role::whereId($id)->first();

		if(!is_object($role)) return Redirect::to('admin/role');

		$roles = Role::where('id', '!=', $id)->get();
		
		return View::make('admin.role.edit')->with('role', $role)->with('roles', $roles);
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
			'name'    => 'required|alpha_dash|min:3|max:45',
			'role_id' => 'exists:roles,role_id'
		);

		$input['role_id'] = Utils::decode_id($input['role_id']);
		$temp_id          = Utils::decode_id($id);
		$validator        = Validator::make($input, $rules);

		if($validator->fails()) return Redirect::to('admin/role/create')->withErrors($validator)->withInput();
		else
		{
			$role          = Role::find($temp_id);
			$role->name    = $input['name'];
			$role->role_id = $input['role_id'];
			$role->save();

			return Redirect::to('admin/role/'.$id.'/edit')->with('message', 'Ha sido modificado el registro exitosamente.');
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
		// TODO: what do with the users with this rol?
		$role = Role::find($id);

		if(is_object($role))
		{
			// delete
		}
		//$user->delete();

		return Redirect::to('admin/role')->with('message', 'Rol eliminado exitosamente.')->with('type', 'success');
	}

}