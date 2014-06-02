<?php

class SearchController extends BaseController 
{
	public function search($table, $filter)
	{
		$input = Input::all();

		if(!isset($input['query_string']) && !isset($input['_view']) && trim($input['query_string']) == "")
			return Redirect::back()->with('errors', true)->with('message', 'Algo salió mal. Intente de nuevo la búsqueda.');

		$table           = Crypt::decrypt($table);
		$filter          = Crypt::decrypt($filter);
		$view            = Crypt::decrypt($input['_view']);
		$filters         = array();
		$special_filters = array();
		$joins           = array();
		$temp_array      = explode('##', $filter);
		$filters         = explode('|', $temp_array[0]);

		try
		{
			// wheres
			if(sizeof($temp_array) > 1)
			{
				$tmp = explode('|', $temp_array[1]);

				foreach ($tmp as $value) 
				{
					$tokens = explode('__', $value);
					$toPush = null;

					if(sizeof($tokens) == 4)
						$toPush = array('table' => $tokens[0], 'column' => $tokens[1],  'operator' => $tokens[2], 'value' => $tokens[3]);
					else if(sizeof($tokens) == 3)
						$toPush = array('table' => $table, 'column' => $tokens[0], 'operator' => $tokens[1], 'value' => $tokens[2]);

					array_push($special_filters, $toPush);
				}
			}

			// joins
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

			// searchs the records according to the filters
			$results = SearchEngine::Search($table, $input['query_string'], $filters, $special_filters, $joins);

			return View::make($view)->with('records', $results)->with('query_string', $input['query_string']);
		}
		catch(Exception $e)
		{
			return Redirect::back()->with('errors', true)->with('message', 'Algo salió mal. Intente de nuevo la búsqueda.');
		}
	}
}