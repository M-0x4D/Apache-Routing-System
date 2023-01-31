<?php

require_once __DIR__ . '/../../../vendor/autoload.php';



use Router\Controllers\Tcontroller;
use Router\Support\Router\Router;
Router::get('test', function () {
    echo 'test';
});
Router::get('fake', function () {
    echo 'fake';
});

Router::get('func', [Tcontroller::class , 'testFunc']);
// Router::post('func', [Tcontroller::class , 'testFunc2']);


Router::getResolve($_SERVER['REQUEST_URI'] ,strtolower($_SERVER['REQUEST_METHOD']) );
// Router::postResolve($_SERVER['REQUEST_URI'] ,strtolower($_SERVER['REQUEST_METHOD']) );