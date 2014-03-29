<?php

class AuthorController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$authors = Author::all()->paginate(10);
		return View::make('view')->with('authors', $authors);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.author_create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validator = Validator::make($input, Rules::$authorRules);

		if($validator-fails()) return Redirect::to('route')->with('message', 'Error en formulario.')->withInput();
		else
		{
			$author = new Author();
			// TODO: put all the fields
			$author->save();
			
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
		$author = Author::find($id);

		if(!$author) return Redirect::to('route');

		return View::make('admin.authors_show')->with('author', $author);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$author = Author::find($id);

		if(!$author) return Redirect::to('route');

		return View::make('admin.authors_edit')->with('author', $author);
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
		$validator = Validator::make($input, Rules::$authorRules);

		if($validator-fails()) return Redirect::to('route')->with('message', 'Error en formulario.')->withInput();
		else
		{
			$author = new Author();
			// TODO: update the fields
			$author->touch();
			$author->save();
			
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
		$author = Author::find($id);
		$author->delete();
	}

}