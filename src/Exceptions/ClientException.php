<?php

namespace DataCue\Exceptions;

class ClientException extends \Exception
{
    public function errorMessage()
    {
        return 'Client error';
    }
}
