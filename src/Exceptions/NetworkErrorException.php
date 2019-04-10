<?php

namespace DataCue\Exceptions;

class NetworkErrorException extends \Exception
{
    public function errorMessage()
    {
        return 'Network Error';
    }
}
