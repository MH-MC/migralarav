<?php

class UserController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
		
		if($validator->fails()) echo "OH SHIT";
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
}