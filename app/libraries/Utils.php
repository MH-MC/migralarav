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
		return self::encode_safe($toEncode);
	}

	public static function decode_id($string)
	{
		$toDecode = self::decode_safe($string);
		//$id = str_replace(array(md5($rounders[0]), md5($rounders[1])), array('',''), $toDecode);
		$length = strlen($toDecode);
		$id = (int) (substr(substr($toDecode, 32), 0, -32));
		return $id;
	}
}