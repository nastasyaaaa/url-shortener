<?php

use Jenssegers\Blade\Blade;

function view($name, $data = [])
{
    $blade = new Blade(VIEWPATH, 'cache/views');

    echo $blade->make($name, $data)->render();
}
