<?php

class Utils 
{
	// This vars allow to get a safe base64 encode
	public static $unallowedChars   = array('+', '/');
	public static $replacementChars = array('_', '-');

	public static function encode_safe($string)
	{
		return str_replace(self::$unallowedChars, self::$replacementChars, base64_encode($string));
	}

	public static function decode_safe($string)
	{
		return base64_decode(str_replace(self::$replacementChars, self::$unallowedChars, $string));
	}

	public static function encode_id($id, $rounders)
	{
		$toEncode = md5($rounders[0]).$id.md5($rounders[1]);
		return Crypt::encrypt(self::encode_safe($toEncode));
	}

	public static function decode_id($string)
	{
		$toDecode = self::decode_safe(Crypt::decrypt($string));
		$id       = (int) (substr(substr($toDecode, 32), 0, -32));
		return $id;
	}

	/**
	 * Search Engine
	 * Sintax for filters: column1|column2|...|columnN##table1__columnTable1_value|table2__columnTable2_value|...|tableN__columnTableN_value##table1__columnTable1__table2__columnTable2__relationship
	 */
	
	/* Member filters */
	public static $MEMBER           = 'users';
	public static $MEMBER_ALL       = 'lastname|firstname|username|email';
	public static $MEMBER_NAME      = 'lastname|firstname';
	public static $MEMBER_USERNAME  = 'username';
	public static $MEMBER_EMAIL     = 'email';
	public static $MEMBER_COMMON    = '##roles__name__=__miembro##roles__id__users__role_id__inner';


	/* Affiliate filters */
	public static $AFFILIATE           = 'users';
	public static $AFFILIATE_ALL       = 'username|email|affiliates.company_name';
	public static $AFFILIATE_NAME      = 'affiliates.company_name';
	public static $AFFILIATE_USERNAME  = 'username';
	public static $AFFILIATE_EMAIL     = 'email';
	public static $AFFILIATE_COMMON    = '##roles__name__=__afiliado##roles__id__users__role_id__inner|affiliates__user_id__users__id__inner';

	/* Adminstrator filters */
	public static $ADMIN           = 'users';
	public static $ADMIN_ALL       = 'lastname|firstname|username|email|roles.name';
	public static $ADMIN_ROL       = 'roles.name';
	public static $ADMIN_NAME      = 'lastname|firstname';
	public static $ADMIN_USERNAME  = 'username';
	public static $ADMIN_EMAIL     = 'email';
	public static $ADMIN_COMMON    = '##roles__role_id__>__0##roles__id__users__role_id__inner';


}