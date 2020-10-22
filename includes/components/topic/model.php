<?php

namespace MyBBApi\Models;

use MyBBApi\Utility\Util;

class Topic extends Model
{
	function PublicFacingData() {
		$data = new \stdClass;

		$data->id = $this->tid;
		$data->title = $this->subject;
		$data->slug = $this->slug;
		$data->author = $this->username; // TODO: turn this into a Member object

		return $data;
	}

	function GetReplies() {
		return array_map( function( $row ) {
			return new Reply( $row );
		}, Util::db()->fetchAll( 'SELECT * FROM pomf_posts WHERE tid = ? ORDER BY dateline ASC', $this->tid ) );
	}
}
