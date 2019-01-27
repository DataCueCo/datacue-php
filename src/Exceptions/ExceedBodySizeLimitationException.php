<?php

namespace DataCue\Exceptions;

class ExceedBodySizeLimitationException extends \Exception
{
    public function errorMessage()
    {
        return 'Exceed List Data Size Error';
    }
}
