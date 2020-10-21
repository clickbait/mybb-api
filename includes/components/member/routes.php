<?php

use MyBBApi\Controllers\MemberController;

$api->get( '/members', function($r) { return MemberController::GetMemberList(); } );
$api->get('/members/{slug}', function ($r, $slug) { return MemberController::GetMemberBySlug( $slug ); } );