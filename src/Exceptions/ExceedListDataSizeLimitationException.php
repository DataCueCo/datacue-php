<?php

namespace DataCue\Exceptions;

class ExceedListDataSizeLimitationException extends \Exception
{
    public function errorMessage()
    {
        return 'Exceed List Data Size Error';
    }
}
