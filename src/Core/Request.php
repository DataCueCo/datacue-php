<?php

namespace DataCue\Core;

use DataCue\Exceptions\ClientException;
use DataCue\Exceptions\ExceedBodySizeLimitationException;
use DataCue\Exceptions\ExceedListDataSizeLimitationException;
use DataCue\Exceptions\NetworkErrorException;
use DataCue\Exceptions\RetryCountReachedException;
use DataCue\Exceptions\UnauthorizedException;

/**
 * Class Request
 * @package DataCue\Core
 */
class Request
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_DELETE = 'DELETE';
    const MAX_LIST_DATA_SIZE = 500;
    const MAX_BODY_SIZE = 5242880; // 5 * 1024 * 1024
    const HTTP_TIMEOUT = 5;

    private $apiKey = null;
    private $apiSecret = null;
    private $options = [
        'max_try_times' => 10,
        'pow_base' => 2,
        'debug' => false,
    ];

    /**
     * Check payload size
     * @param $payload
     * @throws ExceedBodySizeLimitationException
     */
    private function checkPayload($payload)
    {
        if (strlen($payload) > static::MAX_BODY_SIZE) {
            throw new ExceedBodySizeLimitationException();
        }
    }

    /**
     * @param $auth
     * @return array
     */
    private function generateHeader($auth)
    {
        $headers = [
            "Authorization: $auth",
        ];

        foreach (Headers::getHeaders() as $key => $value) {
            $headers[] = "$key: $value";
        }

        return $headers;
    }

    /**
     * Fetch url
     * @param $url
     * @param $method
     * @param $data
     * @param $withoutChecksum
     * @return Response
     * @throws ClientException
     * @throws ExceedBodySizeLimitationException
     * @throws ExceedListDataSizeLimitationException
     * @throws NetworkErrorException
     * @throws RetryCountReachedException
     * @throws UnauthorizedException
     */
    private function request($url, $method, $data, $withoutChecksum)
    {
        if (is_null($data)) {
            $payload = '';
        } else {
            $payload = json_encode($data);
        }

        $this->checkPayload($payload);

        if ($withoutChecksum) {
            $encode = base64_encode("{$this->apiKey}:");
        } else {
            $checksum = hash_hmac('sha256', $payload, $this->apiSecret, false);
            $encode = base64_encode("{$this->apiKey}:$checksum");
        }
        $auth = "Basic $encode";

        if ($this->options['debug']) {
            print_r($method . ' ' . $url . "\n");
            print_r($auth . "\n");
        }

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($curl, CURLOPT_TIMEOUT, static::HTTP_TIMEOUT);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->generateHeader($auth));
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        if ($method !== static::METHOD_GET) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
        }
        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($this->options['debug']) {
            print_r('code: ' . $httpCode . ' ');
            print_r($response. "\n");
        }

        if ($httpCode === 0) {
            $errno = curl_errno($curl);
            $error = curl_error($curl);
            curl_close($curl);
            throw new NetworkErrorException("HttpCode=$httpCode&Body=$response&Errno=$errno&Error=$error");
        }

        curl_close($curl);

        if ($httpCode === 401) {
            throw new UnauthorizedException("HttpCode=$httpCode&Body=$response");
        }

        if ($httpCode === 413) {
            throw new ExceedListDataSizeLimitationException("HttpCode=$httpCode&Body=$response");
        }

        if ($httpCode >= 400 && $httpCode < 500) {
            throw new ClientException("HttpCode=$httpCode&Body=$response");
        }

        if ($httpCode >= 500 && $httpCode < 600) {
            throw new RetryCountReachedException("HttpCode=$httpCode&Body=$response");
        }

        return new Response($httpCode, json_decode($response));
    }

    /**
     * fetch url with retry
     * @param $url
     * @param $method
     * @param null $data
     * @param bool $withoutChecksum
     * @return Response|null
     * @throws ClientException
     * @throws ExceedBodySizeLimitationException
     * @throws ExceedListDataSizeLimitationException
     * @throws NetworkErrorException
     * @throws RetryCountReachedException
     * @throws UnauthorizedException
     */
    private function requestWithBackOffRetry($url, $method, $data = null, $withoutChecksum = false)
    {
        $tryTimes = 0;

        while (++$tryTimes <= $this->options['max_try_times']) {
            if ($this->options['debug']) {
                print_r("try $tryTimes times\n");
            }

            if ($tryTimes === $this->options['max_try_times']) {
                return $this->request($url, $method, $data, $withoutChecksum);
            }

            try {
                return $this->request($url, $method, $data, $withoutChecksum);
            } catch (RetryCountReachedException $e) {
                sleep(pow($this->options['pow_base'], $tryTimes - 1));
            }
        }

        return null;
    }

    /**
     * Request constructor.
     * @param $apiKey
     * @param $apiSecret
     * @param array $options
     */
    public function __construct($apiKey, $apiSecret, $options = [])
    {
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
        $this->options = array_merge($this->options, $options);
    }

    /**
     * get request
     * @param $url
     * @return Response|null
     * @throws ClientException
     * @throws ExceedBodySizeLimitationException
     * @throws ExceedListDataSizeLimitationException
     * @throws NetworkErrorException
     * @throws RetryCountReachedException
     * @throws UnauthorizedException
     */
    public function get($url)
    {
        return $this->requestWithBackOffRetry($url, static::METHOD_GET, null);
    }

    /**
     * post request
     * @param $url
     * @param $data
     * @param bool $withoutChecksum
     * @return Response|null
     * @throws ClientException
     * @throws ExceedBodySizeLimitationException
     * @throws ExceedListDataSizeLimitationException
     * @throws NetworkErrorException
     * @throws RetryCountReachedException
     * @throws UnauthorizedException
     */
    public function post($url, $data, $withoutChecksum = false)
    {
        return $this->requestWithBackOffRetry($url, static::METHOD_POST, $data, $withoutChecksum);
    }

    /**
     * put request
     * @param $url
     * @param $data
     * @param bool $withoutChecksum
     * @return Response|null
     * @throws ClientException
     * @throws ExceedBodySizeLimitationException
     * @throws ExceedListDataSizeLimitationException
     * @throws NetworkErrorException
     * @throws RetryCountReachedException
     * @throws UnauthorizedException
     */
    public function put($url, $data, $withoutChecksum = false)
    {
        return $this->requestWithBackOffRetry($url, static::METHOD_PUT, $data, $withoutChecksum);
    }

    /**
     * delete request
     * @param $url
     * @param null $data
     * @param bool $withoutChecksum
     * @return Response|null
     * @throws ClientException
     * @throws ExceedBodySizeLimitationException
     * @throws ExceedListDataSizeLimitationException
     * @throws NetworkErrorException
     * @throws RetryCountReachedException
     * @throws UnauthorizedException
     */
    public function delete($url, $data = null, $withoutChecksum = false)
    {
        return $this->requestWithBackOffRetry($url, static::METHOD_DELETE, $data, $withoutChecksum);
    }
}
