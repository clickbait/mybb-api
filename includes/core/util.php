<?php

namespace MyBBApi\Utility;

class Util
{
	
	public static function db()
	{
		global $db;

		return $db;
	}

	public static function JsonResponse( $data ) {
		header( 'Content-Type: application/json' );

		return json_encode( $data );
	}
}