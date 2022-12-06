<?php

namespace App\Services\Geo\Exception;

use RuntimeException;
use Throwable;

class InvalidResponseException extends RuntimeException
{
    public function __construct($message = "", Throwable $previous = null)
    {
        parent::__construct($message, 400, $previous);
    }
}
