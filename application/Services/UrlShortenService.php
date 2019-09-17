<?php

namespace App\Services;

class UrlShortenService
{
    /** CREATE URL UNIQUE ALIAS DEPENDING ON UNIQUE ID FROM DB **/
    public function shorten($id)
    {
        return '/' . base_convert($id, 10, 32);
    }
}