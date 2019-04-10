<?php

namespace DataCue\Exceptions;

class UnauthorizedException extends ClientException
{
    public function errorMessage()
    {
        return 'Api key is not authorized';
    }
}
