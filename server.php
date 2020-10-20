<?php
use Mark\App;

require 'vendor/autoload.php';

$db = new Nette\Database\Connection('mysql:host=127.0.0.1;dbname=eroticat', 'root', '');

$api = new App('http://0.0.0.0:6969');
$api->count = 4; // process count

$api->any('/', function ($requst) use ( $db ) {
    $result = $db->query('SELECT * FROM pomf_users');
    $count = $result->getRowCount();

    return "There are {$count} users in the database.";
});

$api->get('/hello/{name}', function ($requst, $name) {
    return "Hello $name";
});

$api->post('/user/create', function ($requst) {
    return json_encode(['code'=>0 ,'message' => 'ok']);
});

$api->start();
