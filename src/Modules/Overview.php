<?php

namespace DataCue\Modules;

/**
 * Class Overview
 * @package DataCue\Modules
 */
class Overview extends Base
{
    /**
     * Get existing IDs of products
     *
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     */
    public function products()
    {
        return $this->request->get($this->url('overview/products'));
    }

    /**
     * Get existing IDs of orders
     *
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     */
    public function orders()
    {
        return $this->request->get($this->url('overview/orders'));
    }

    /**
     * Get existing IDs of users
     *
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     */
    public function users()
    {
        return $this->request->get($this->url('overview/users'));
    }

    /**
     * Get existing IDs of users/products/orders
     *
     * @return \DataCue\Core\Response|null
     * @throws \DataCue\Exceptions\InvalidEnvironmentException
     */
    public function all()
    {
        return $this->request->get($this->url('overview'));
    }
}
