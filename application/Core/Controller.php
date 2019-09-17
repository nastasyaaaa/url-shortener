<?php

namespace App\Core;

use App\Core\Http\Response;

class Controller
{
    protected $view, $response;

    public function __construct()
    {
        $this->response = new Response();
    }


}