<?php

namespace DataCue\Core;

/**
 * Class Response
 * @package DataCue\Core
 */
class Response
{
    /**
     * @var null|int
     */
    private $httpCode = null;

    /**
     * @var null|object
     */
    private $data = null;

    /**
     * Response constructor.
     * @param $httpCode
     * @param $data
     */
    public function __construct($httpCode, $data)
    {
        $this->httpCode = $httpCode;
        $this->data = $data;
    }

    /**
     * @return false|string
     */
    public function __toString()
    {
        return json_encode([
            'httpCode' => $this->httpCode,
            'data' => $this->data,
        ]);
    }

    /**
     * Get http code
     * @return int|null
     */
    public function getHttpCode() {
        return $this->httpCode;
    }

    /**
     * get data
     * @return null|object
     */
    public function getData() {
        return $this->data;
    }
}
