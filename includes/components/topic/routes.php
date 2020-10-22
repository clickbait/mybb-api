<?php

use MyBBApi\Controllers\TopicController;

$api->get('/topics/{slug}', function ($r, $slug) { return TopicController::GetTopicBySlug( $slug ); } );
