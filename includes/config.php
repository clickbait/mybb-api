<?php

$conf['url'] = 'http://localhost';
$conf['port'] = '6969';

$conf['db'] = array(
	'dsn' => 'mysql:host=127.0.0.1;dbname=eroticat',
	'username' => 'root',
	'password' => '',
);

$conf['components'] = array(
	'category',
	'member',
	'reply',
	'topic'
);
