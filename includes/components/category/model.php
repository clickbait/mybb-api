<?php

namespace MyBBApi\Models;

use MyBBApi\Utility\Util;

class Category extends Model
{
	function PublicFacingData() {
		$data = new \stdClass;

		$data->id = $this->fid;
		$data->name = $this->name;
		$data->slug = $this->slug;
		$data->description = $this->description;

		$children = Util::db()->fetchAll( 'SELECT * FROM pomf_forums WHERE pid = ? ORDER BY disporder ASC', $this->fid );

		if ( count( $children ) ):
			$data->children = array();

			foreach ( $children as $child ):
				$data->children[] = (new Category($child))->PublicFacingData();
			endforeach;
		endif;

		return $data;
	}

	function GetTopics() {
		return array_map( function( $row ) {
			return new Topic( $row );
		}, Util::db()->fetchAll( 'SELECT * FROM pomf_threads WHERE fid = ? ORDER BY lastpost DESC LIMIT 50', $this->fid ) );
	}
}
