<?php

namespace DataCue\Modules;

use DataCue\Constants;
use DataCue\Exceptions\InvalidEnvironmentException;

class Base
{
    /**
     * @var \DataCue\Core\Request
     */
    protected $request = null;

    /**
     * @var string
     */
    protected $env = null;

    /**
     * Generate full url
     * @param $url
     * @return string
     * @throws InvalidEnvironmentException
     */
    protected function url($url)
    {
        if ($this->env === 'production') {
            return Constants::BASE_PRODUCTION_API_URL . $url;
        }

        if ($this->env === 'development') {
            return Constants::BASE_DEVELOPMENT_API_URL . $url;
        }

        throw new InvalidEnvironmentException();
    }

    public function __construct($request, $env = 'production')
    {
        $this->request = $request;
        $this->env = $env;
    }
}
