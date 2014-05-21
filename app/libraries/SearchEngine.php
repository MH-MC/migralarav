<?php

class SearchEngine
{
	private static $pages = 15;

	public static function Search($table, $query_string, $filters, $special_filters)
	{
		if(empty($filters) && empty($special_filters)) return null;

		$results = DB::table($table)
            ->where(function($query) use($special_filters)
            {
            	foreach ($special_filters as $filter) 
            	{
            		$query->where($filter['column'], '=', $filter['value']);
            	}
            })
            ->where(function($query) use ($filters, $query_string)
            {
                foreach ($filters as $index => $filter) 
            	{
            		$query->orWhere($filter, 'like', '%'.$query_string.'%');
            	}
            })
            ->paginate(self::$pages);

            return $results;
	}
}