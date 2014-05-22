<?php

class SearchController extends BaseController 
{

	public function search($table, $filter)
	{
		$input = Input::all();

		if(!isset($input['query_string']) && trim($input['query_string']) == "") Redirect::back()->with('errors', true)->with('message', 'Algo salió mal. Intente de nuevo la búsqueda.');

		$table           = Crypt::decrypt($table);
		$filter          = Crypt::decrypt($filter);
		$filters         = array();
		$special_filters = array();
		$joins           = array();
		$temp_array      = explode('##', $filter);
		$filters         = explode('|', $temp_array[0]);

		// @TODO
		if(sizeof($temp_array) > 1)
		{
			$tmp = explode('|', $temp_array[1]);

			foreach ($tmp as $value) 
			{
				$tokens = explode('__', $value);
				$toPush = null;

				if(sizeof($tokens) == 3)
					$toPush = array('table' => $tokens[0], 'column' => $tokens[1], 'value' => $tokens[2]);
				else if(sizeof($tokens) == 2)
					$toPush = array('table' => $table, 'column' => $tokens[1], 'value' => $tokens[2]);

				array_push($special_filters, $toPush);
			}
		}

		// JOIN table2__column2__table1__column1__relation
		if(sizeof($temp_array) > 2)
		{
			$tmp = explode('|', $temp_array[2]);

			foreach ($tmp as $value) 
			{
				$tokens = explode('__', $value);
				$toPush = null;

				if(sizeof($tokens) == 5)
					$toPush = array('table2' => $tokens[0], 'column2' => $tokens[1], 'table1' => $tokens[2], 'column1' => $tokens[3], 'relation' => $tokens[4]);

				array_push($joins, $toPush);
			}
		}

		//echo sizeof($temp_array);
		$results = SearchEngine::Search($table, $input['query_string'], $filters, $special_filters, $joins);

		//print_r($results);
		return View::make('admin.user.index')->with('users', $results);
	}
}