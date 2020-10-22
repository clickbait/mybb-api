<?php

namespace MyBBApi\Controllers;

use MyBBApi\Utility\Util;
use MyBBApi\Models\Topic;

class TopicController extends Controller
{

	public static function GetTopicBySlug( $slug ) {
		$topic = Util::db()->fetch( 'SELECT * FROM pomf_threads WHERE slug = ?', $slug );
		$topic = new Topic( $topic );

		$replies = $topic->GetReplies();

		$data = new \stdClass;

		// TODO: paginate
		$data->topic = $topic->PublicFacingData();

		if ( count( $replies ) ):
			$data->replies = array();

			foreach ( $replies as $reply ):
				$data->replies[] = $reply->PublicFacingData();
			endforeach;
		endif;

		return Util::JsonResponse( $data );
	}
}
