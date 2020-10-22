<?php

namespace MyBBApi\Controllers;

use MyBBApi\Utility\Util;
use MyBBApi\Models\Category;

class CategoryController extends Controller
{
	public static function GetCategoryList() {
		$result = Util::db()->fetchAll('SELECT * FROM pomf_forums WHERE pid = 0 ORDER BY disporder ASC');

		$categories = array();

		foreach ( $result as $row ):
			$categories[] = (new Category($row))->PublicFacingData();
		endforeach;

		return Util::JsonResponse( $categories );
	}

	public static function GetCategoryBySlug( $slug ) {
		$category = Util::db()->fetch( 'SELECT * FROM pomf_forums WHERE slug = ?', $slug );
		$category = new Category( $category );

		$topics = $category->GetTopics();

		$data = new \stdClass;

		$data->category = $category->PublicFacingData();

		if ( count( $topics ) ):
			$data->topics = array();

			foreach ( $topics as $topic ):
				$data->topics[] = $topic->PublicFacingData();
			endforeach;
		endif;

		return Util::JsonResponse( $data );
	}
}
