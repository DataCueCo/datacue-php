<?php

namespace DataCue\Exceptions;

class RetryCountReachedException extends \Exception
{
    public function errorMessage()
    {
        return 'Retry Count Reached Error';
    }
}
