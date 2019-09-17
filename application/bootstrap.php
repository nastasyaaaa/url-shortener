<?php

use App\Core\Route;
use App\Core\Http\Request;


$route = new Route();
$request = new Request();


$route->get('/', ['\App\Controllers\MainController', 'main']);
$route->get('/table', ['\App\Controllers\MainController', 'urlTable']);

$route->post('/make', ['\App\Controllers\MainController', 'shortenUrl']);

$route->get('/{slug}', ['\App\Controllers\MainController', 'getUrlBySlug']);



$route->start($request);