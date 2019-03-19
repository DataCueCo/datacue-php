<?php

namespace DataCue\Modules;

/**
 * Class Overview
 * @package DataCue\Modules
 */
class Overview extends Base
{
    /**
     * Get exists IDs of type
     *
     * @param $type
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     */
    public function getExistsIds($type)
    {
        return $this->request->get($this->url("overview/$type"));
    }
}
