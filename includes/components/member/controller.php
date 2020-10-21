<?php

namespace MyBBApi\Controllers;

use MyBBApi\Utility\Util;
use MyBBApi\Models\Member;

class MemberController extends Controller
{
	public static function GetMemberList() {
		$result = Util::db()->fetchAll('SELECT * FROM pomf_users ORDER BY uid LIMIT 50');

		$users = array();

		foreach ( $result as $row ):
			$users[] = (new Member($row))->PublicFacingData();
		endforeach;

		return json_encode( $users );
	}

	public static function GetMemberBySlug( $slug ) {
		$member = Util::db()->fetch( 'SELECT * FROM pomf_users WHERE slug = ?', $slug );
		$member = new Member( $member );

		return json_encode( $member->PublicFacingData() );
	}
}
