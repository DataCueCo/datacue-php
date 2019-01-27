<?php

namespace DataCue\Exceptions;

class InvalidEnvironmentException extends \Exception
{
    public function errorMessage()
    {
        return 'Invalid Environment Error';
    }
}
