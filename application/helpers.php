<?php

use Jenssegers\Blade\Blade;


function view($name, $data = [])
{
    $blade = new Blade(VIEWPATH, 'cache/views');

    echo $blade->make($name, $data)->render();
}


function config($name)
{
    $arr = explode('.', $name, 2);

    if (count($arr) < 2) {
        throw new Exception('Can`t resolve config');
    }

    $filepath = CONFIGPATH . "/$arr[0].php";
    $key = $arr[1];

    if (!file_exists($filepath)) {
        throw new Exception('Config file doesn`t exists.');
    }

    $config = include $filepath;

    return array_key_exists($key, $config) ? $config[$key] : null;
}