<?php

use MyBBApi\Controllers\MemberController;

$api->get( '/members', function($e) { return MemberController::GetMemberList(); } );
