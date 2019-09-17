<?php

namespace App\Core\Http\Exceptions;

use Throwable;

class NotFoundHttpException extends \Exception
{
    public function __construct($message = "Not Found", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}