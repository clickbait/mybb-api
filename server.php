<?php
use Mark\App;

require 'vendor/autoload.php';

$api = new App('http://0.0.0.0:6969');
$api->count = 4; // process count

$api->any('/', function ($requst) use ( $db ) {
    return 'Hello world';
});

$api->get('/hello/{name}', function ($requst, $name) {
    return "Hello $name";
});

$api->post('/user/create', function ($requst) {
    return json_encode(['code'=>0 ,'message' => 'ok']);
});

$api->start();
