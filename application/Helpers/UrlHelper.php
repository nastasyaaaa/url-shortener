<?php

namespace App\Helpers;

class UrlHelper
{
    public static function make($uri)
    {
        return self::getProtocol() . '://' . $_SERVER['HTTP_HOST'] . $uri;
    }

    private static function getProtocol()
    {
        return $_SERVER['HTTP_SSL'] ? 'https' : 'http';
    }

    public static function normalizeUrl ($url)
    {
        if(!preg_match('/^(http(s){0,1})/', $url)) {
            return self::getProtocol() . '://' . $url;
        }

        return $url;
    }

}