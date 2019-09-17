<?php

namespace Core\Http;

class Response
{

    public function JsonResponse($data, $code = 200)
    {
        header('Content-Type: application/json');
        header('Status: ' . $code);

        echo json_encode($data);
        return 0;
    }

    public function redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }

}