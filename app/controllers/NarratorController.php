<?php

class NarratorController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$narrators = Narrator::all()->paginate(10);
		return View::make('view')->with('narrators', $narrators);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.narrator_create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validator = Validator::make($input, Rules::$narratorRules);

		if($validator-fails()) return Redirect::to('route')->with('message', 'Error en formulario.')->withInput();
		else
		{
			$narrator = new narrator();
			// TODO: put all the fields
			$narrator->save();
			
			return Redirect::to('route')->with('message', 'Registro creado exitosamente.');
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
		$narrator = Narrator::find($id);

		if(!$narrator) return Redirect::to('route');

		return View::make('admin.narrators_show')->with('narrator', $narrator);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$narrator = Narrator::find($id);

		if(!$narrator) return Redirect::to('route');

		return View::make('admin.narrators_edit')->with('narrator', $narrator);
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
		$validator = Validator::make($input, Rules::$narratorRules);

		if($validator-fails()) return Redirect::to('route')->with('message', 'Error en formulario.')->withInput();
		else
		{
			$narrator = new narrator();
			// TODO: update the fields
			$narrator->touch();
			$narrator->save();
			
			return Redirect::to('route')->with('message', 'Registro creado exitosamente.');
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
		$narrator = Narrator::find($id);
		$narrator->delete();
	}

}