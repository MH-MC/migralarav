<?php

class AudiobookController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$books = Audiobook::all()->paginate(10);
		return View::make('admin.books')->with('books', $books);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	// TODO: Only this can be used in public
	public function create()
	{
		return View::make('admin.books_create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	// TODO: Only this can be used in public
	public function store()
	{
		$input = Input::all();
		$validator = Validator::make($input, Rules::$audiobookRules);

		if($validator-fails()) return Redirect::to('formulario_public_audiobook')->with('message', 'Error en formulario.')->withInput();
		else
		{
			$audiobook = new Audiobook();
			// TODO: put all the fields
			$audiobook->save();
			
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
		$book = Audiobook::find($id);

		if(!$book) return Redirect::to('route');

		return View::make('admin.books_show')->with('book', $book);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$book = Audiobook::find($id);

		if(!$book) return Redirect::to('route');

		return View::make('admin.books_edit')->with('book', $book);
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

		$validator = Validator::make($input, Rules::$editAudiobook);

		if($validator->fails()) return Redirect::to('old_route')->with('message', 'Error en el formulario');
		else
		{
			$book = Audiobook::find($id);
			// Update the fields
			$book->touch();
			$book->save();

			return Redirect::to('route')->with('message', 'Registro actualizado.');
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
		$book = Audiobook::find($id);
		$book->delete();
	}

}