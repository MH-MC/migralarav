<?php

class AffiliateController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$role       = Role::whereName('afiliado')->first();
		$affiliates = User::whereRoleId($role->id)->with('affiliate')->paginate(15);
		
		return View::make('admin.affiliate.index')->with('users', $affiliates);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.affiliate.create');
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
		$validator          = Validator::make($input, Rules::$createAffiliateRules, Rules::$customErrorMessages);

		if($validator->fails()) return Redirect::to('admin/affiliate/create')->withErrors($validator)->withInput();
		else
		{
			// TODO: Put this into transaction DB
			$user            = new User();
			$user->role_id   = Role::whereName('afiliado')->first()->id;
			$user->username  = $input['username'];
			$user->password  = Hash::make($input['password']);
			$user->firstname = $input['firstname'];
			$user->lastname  = $input['firstname'];
			$user->email     = $input['email'];
			$user->phone     = $input['phone'];
			$user->cellphone = $input['cellphone'];
			$user->sex       = 'NA';
			$user->save();

			if($user->id)
			{
				$affiliate                = new Affiliate();
				$affiliate->user_id      = $user->id;
				$affiliate->position     = $input['position'];
				$affiliate->company_name = $input['company_name'];
				$affiliate->website      = $input['website'];
				$affiliate->address      = $input['address'];
				$affiliate->description  = $input['description'];
				$affiliate->save();
				// TODO: the others fields (verify)
			}
			//else TODO

			return Redirect::to('admin/affiliate/'.Utils::encode_id($user->id, array($user->username, $user->email)))->with('message', 'Usuario creado exitosamente.');

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
		$user = User::whereId($id)->with('role', 'affiliate')->first();

		if(!$user) return Redirect::to('admin/affiliate');
		
		return View::make('admin.affiliate.show')->with('user', $user);
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
		$user = User::whereId($id)->with('role', 'affiliate')->first();

		if(!$user) return Redirect::to('admin/affiliate');
		
		return View::make('admin.affiliate.edit')->with('user', $user);
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
			'firstname'    => 'required|min:3|max:50|regex:/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.\'-]+$/u', 
			'email'        => 'required|min:6|max:50|email|unique:users,email,'.$temp_id, 
			'phone'        => 'min:6|max:45|regex:/^\+?[0-9-()]+$/', 
			'cellphone'    => 'min:6|max:45|regex:/^\+?[0-9-()]+$/', 
			'position'     => 'required|max:50',
			'company_name' => 'required|max:50',
			'website'      => 'required|max:100|url',
			'address'      => 'required|max:150',
			'description'  => 'required',
		);

		$validator = Validator::make($input, $rules, Rules::$customErrorMessages);

		if($validator->fails()) return Redirect::to('admin/affiliate/'.$id.'/edit')->withErrors($validator)->withInput();
		else
		{
			$user                          = User::find($temp_id);
			$user->firstname               = $input['firstname'];
			$user->lastname                = $input['firstname'];
			$user->email                   = $input['email'];
			$user->phone                   = $input['phone'];
			$user->cellphone               = $input['cellphone'];
			$user->affiliate->position     = $input['position'];
			$user->affiliate->company_name = $input['company_name'];
			$user->affiliate->website      = $input['website'];
			$user->affiliate->address      = $input['address'];
			$user->affiliate->description  = $input['description'];
			$user->push();

			// TODO: It should send a notification to the new email
			// TODO: Regenerate password logic

			return Redirect::to('admin/affiliate/'.$id.'/edit')->with('message', 'Ha sido modificado el registro exitosamente');
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

		return Redirect::to('admin/affiliate');
	}

}