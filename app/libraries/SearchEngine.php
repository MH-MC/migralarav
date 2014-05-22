<?php

class SearchEngine
{
	private static $pages = 15;

	public static function Search($table, $query_string, $filters, $special_filters, $joins)
	{
		if(empty($filters) && empty($special_filters)) return null;

		$statement = DB::table($table);

            foreach ($joins as $join) 
            {
                  if($join['relation'] == 'inner')
                        $statement->join($join['table2'], $join['table2'].'.'.$join['column2'], '=', $join['table1'].'.'.$join['column1']);
                  if($join['relation'] == 'left')
                        $statement->leftJoin($join['table2'], $join['table2'].'.'.$join['column2'], '=', $join['table1'].'.'.$join['column1']);
            }

            //->join()
            $results = $statement->where(function($query) use($special_filters)
            {
            	foreach ($special_filters as $filter) 
            	{
            		$query->where($filter['table'].'.'.$filter['column'], '=', $filter['value']);
            	}
            })
            /*->where(function($query) use ($filters, $query_string)
            {
                foreach ($filters as $index => $filter) 
            	{
            		$query->orWhere($filter, 'like', '%'.$query_string.'%');
            	}
            })*/
            ->paginate(self::$pages);

            return $results;
	}
}