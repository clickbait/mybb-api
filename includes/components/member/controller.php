<?php

namespace MyBBApi\Controllers;

use MyBBApi\Utility\Util;

class MemberController extends Controller
{
	public static function GetMemberList() {
		$result = Util::db()->query('SELECT * FROM pomf_users ORDER BY uid LIMIT 50');

		$users = array();

		foreach ( $result as $row ):
			$users[] = $row;
		endforeach;

		return json_encode( $users );
	}
}
