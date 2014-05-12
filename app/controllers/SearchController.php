<?php

class SearchController extends BaseController {

	public static function searchMember($filter, $query)
	{

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

	public static function search($id, $filter)
	{
		$input = Input::all();
		$id = Utils::decode_safe($id);

		if(!isset($input['query']) || trim($input['query']) == "") return;

		switch ($id) 
		{
			case 'member':
				# code...
				break;

			case 'affiliate':
				# code...
				break;

			case 'admin':
				# code...
				break;

			case 'role':
				# code...
				break;
			
			default:
				# code...
				break;
		}

	}
}