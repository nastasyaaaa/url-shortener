<?php

use Core\Route;
use Core\Http\Request;


$route = new Route();
$request = new Request();


$route->get('/', ['\Controllers\MainController', 'main']);
$route->get('/table', ['\Controllers\MainController', 'urlTable']);

$route->post('/make', ['\Controllers\MainController', 'shortenUrl']);

$route->get('/{slug}', ['\Controllers\MainController', 'getUrlBySlug']);



$route->start($request);