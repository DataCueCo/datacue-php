<?php

namespace DataCue\Exceptions;

class ExceedBodySizeLimitationException extends ClientException
{
    public function errorMessage()
    {
        return 'Exceed List Data Size Error';
    }
}
