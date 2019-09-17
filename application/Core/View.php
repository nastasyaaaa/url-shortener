<?php

namespace Core;

class View
{
    public function generate ($templateView , $data = NULL)
    {
        if (is_array($data)) {
            extract($data);
        }
        include ROOT . '/views/' . $templateView;
    }

}