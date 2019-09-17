<?php

define('APPFOLDER', $_SERVER['DOCUMENT_ROOT'] . '/application/');


function autoload($className)
{
    $path = str_replace('\\', '/', $className) . '.php';
    require_once(APPFOLDER . $path);
}


spl_autoload_register('autoload');
