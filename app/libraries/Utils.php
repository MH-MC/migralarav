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

	// Search Filters
	public static $USER             = 'users';
	public static $MEMBER_ALL       = 'lastname|firstname|username|email##roles__id__3##roles__id__users__role_id__inner|authors__id__users__id__inner';
	public static $MEMBER_NAME      = 'lastname|firstname';
	public static $MEMBER_USERNAME  = 'username';
	public static $MEMBER_EMAIL     = 'email';

}