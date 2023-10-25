<?php

namespace App\Exceptions;

class InvalidArgumentsException extends \RuntimeException
{
    protected $code = 422;

    protected $message = 'Invalid Arguments';
}
