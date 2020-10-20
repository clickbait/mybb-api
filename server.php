<?php
use Mark\App;

include 'includes/config.php';
include 'includes/util.php';
include 'includes/controllers.php';

require 'vendor/autoload.php';

$db = new Nette\Database\Connection(
	$conf['db']['dsn'],
	$conf['db']['username'],
	$conf['db']['password']
);

$api = new App('http://0.0.0.0:6969');
$api->count = 4; // process count

include 'includes/routes.php';

$api->start();
