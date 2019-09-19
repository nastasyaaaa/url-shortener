<?php

define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('APPFOLDER', $_SERVER['DOCUMENT_ROOT'] . '/application/');
define('VIEWPATH', $_SERVER['DOCUMENT_ROOT'] . '/views');
define('CONFIGPATH', $_SERVER['DOCUMENT_ROOT'] . '/config');

require_once 'vendor/autoload.php';

require_once 'application/bootstrap.php';
