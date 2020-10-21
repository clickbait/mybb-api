<?php

use MyBBApi\Controllers\CategoryController;

$api->get( '/categories', function($r) { return CategoryController::GetCategoryList(); } );
$api->get('/categories/{slug}', function ($r, $slug) { return CategoryController::GetCategoryBySlug( $slug ); } );