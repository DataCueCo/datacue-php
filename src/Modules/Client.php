<?php

namespace DataCue\Modules;

/**
 * Class Client
 * @package DataCue\Modules
 */
class Client extends Base
{
    /**
     * Clear all data
     *
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\ClientException
     * @throws \DataCue\Exceptions\ExceedBodySizeLimitationException
     * @throws \DataCue\Exceptions\ExceedListDataSizeLimitationException
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     * @throws \DataCue\Exceptions\NetworkErrorException
     * @throws \DataCue\Exceptions\RetryCountReachedException
     * @throws \DataCue\Exceptions\UnauthorizedException
     */
    public function clear()
    {
        return $this->request->delete($this->url('clients'));
    }
}
