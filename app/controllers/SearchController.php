<?php

class SearchController extends BaseController {

	public static function searchMember($filter, $query)
	{
		$filter = Utils::decode_safe($filter);
		$role   = Role::whereName('miembro')->first();

		switch ($filter) 
		{
			case 'all':
				
				$users = User::whereRoleId($role->id)

							->paginate(15);

				break;

			case 'username':
				# code...
				break;

			case 'name':
				# code...
				break;

			case 'email':
				# code...
				break;
			
			default:
				# code...
				break;
		}
	}

	public static function searchAffiliate($filter, $query)
	{

	}

	public static function searchAdmin($filter, $query)
	{

	}

	public static function searchRole($filter, $query)
	{

	}

	public function search($table, $filter)
	{
		$input = Input::all();

		if(!isset($input['query_string']) && trim($input['query_string']) == "") Redirect::back()->with('errors', true)->with('message', 'Algo salió mal. Intente de nuevo la búsqueda.');

		$table  = Crypt::decrypt($table);
		$filter = Crypt::decrypt($filter);

		$filters = array();

		$special_filters = array();

		$temp_array = explode('#', $filter);

		$filters = explode('|', $temp_array[0]);

		// @TODO
		if(sizeof($temp_array) > 1)
		{
			$temp_array = explode('|', $temp_array[1]);

			foreach ($temp_array as $value) 
			{

			}
		}

		$results = SearchEngine::Search($table, $input['query_string'], $filters, $special_filters);

		//print_r($results);
		return View::make('admin.user.index')->with('users', $results);
	}
}