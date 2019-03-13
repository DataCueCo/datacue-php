<?php

namespace DataCue\Exceptions;

class UnauthorizedException extends \Exception
{
    public function errorMessage()
    {
        return 'Api key is not authorized';
    }
}
