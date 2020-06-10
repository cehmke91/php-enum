<?php

namespace Cehmke\Enums\Exceptions;

use Exception;

class UndefinedEnumElementException extends Exception
{
    public function __construct($message = null, $value = null, $previous = null)
    {
        $message = "Attempting to use a value not defined on this Enum.";

        parent::__construct($message, null, $previous);
    }
}