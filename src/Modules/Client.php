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
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     */
    public function clear()
    {
        return $this->request->delete($this->url('clients'));
    }
}
