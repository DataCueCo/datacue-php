<?php

namespace DataCue\Exceptions;

class ExceedListDataSizeLimitationException extends ClientException
{
    public function errorMessage()
    {
        return 'Exceed List Data Size Error';
    }
}
