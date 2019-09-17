<?php

namespace Core;

use Core\Http\Response;

class Controller
{
    protected $view, $response;

    public function __construct()
    {
        $this->view = new View();
        $this->response = new Response();
    }


}