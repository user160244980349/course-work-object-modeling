<?php

namespace App\Exceptions;

use Exception;

// Исключения для парсера выражений
class ArithmeticException extends Exception
{

    function __construct($msg, $code)
    {
        return parent::__construct($msg, $code);
    }

    function __toString()
    {
        return get_class($this) . '('
            . $this->code . '): '
            . $this->message;
    }

}
