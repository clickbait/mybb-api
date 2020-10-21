<?php

use Mark\App;

require 'config.php';
require 'core/util.php';

require 'core/classes/model.php';
require 'core/classes/controller.php';
require 'vendor/autoload.php';

$db = new Nette\Database\Connection(
	$conf['db']['dsn'],
	$conf['db']['username'],
	$conf['db']['password']
);

$api = new App("{$conf['url']}:{$conf['port']}");
$api->count = 4; // process count

foreach ( $conf['components'] as $component ):
	include "components/{$component}/model.php";
	include "components/{$component}/controller.php";
	include "components/{$component}/routes.php";
endforeach;

require 'core/routes.php';
