<?php

namespace DataCue\Modules;

use DataCue\Constants;
use DataCue\Exceptions\InvalidEnvironmentException;

/**
 * Class Event
 * @package DataCue\Modules
 */
class Event extends Base
{
    /**
     * Generate full url
     * @param $url
     * @return string
     * @throws InvalidEnvironmentException
     */
    protected function url($url)
    {
        if ($this->env === 'production') {
            return Constants::BASE_PRODUCTION_EVENT_URL . $url;
        }

        if ($this->env === 'development') {
            return Constants::BASE_DEVELOPMENT_EVENT_URL . $url;
        }

        throw new InvalidEnvironmentException();
    }

    /**
     * Track event
     * @param $userData
     * @param $eventData
     * @param null $context
     * @param null $timestamp
     * @return \DataCue\Core\Response|null
     * @throws InvalidEnvironmentException
     */
    public function track($userData, $eventData, $context = null, $timestamp = null)
    {
        $data = [
            'user' => $userData,
            'event' => $eventData,
        ];

        if (!is_null($context)) {
            $data['context'] = $context;
        }

        if (!is_null($timestamp)) {
            $data['timestamp'] = $timestamp;
        }

        return $this->request->post($this->url(''), $data, true);
    }
}
