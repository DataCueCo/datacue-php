<?php

namespace DataCue;

use DataCue\Core\Request;
use DataCue\Modules\Product;
use DataCue\Modules\User;
use DataCue\Modules\Order;
use DataCue\Modules\Event;

/**
 * Class Client
 * @package DataCue
 */
class Client
{
    private static $modules = [
        'products' => Product::class,
        'users' => User::class,
        'orders' => Order::class,
        'events' => Event::class,
    ];

    /**
     * @var \DataCue\Modules\Product|null
     */
    private $products = null;

    /**
     * @var \DataCue\Modules\User|null
     */
    private $users = null;

    /**
     * @var \DataCue\Modules\Order|null
     */
    private $orders = null;

    /**
     * @var \DataCue\Modules\Event|null
     */
    private $events = null;

    /**
     * @var \DataCue\Core\Request|null
     */
    private $request = null;

    /**
     * @var null|string
     */
    private $env = null;

    public function __construct($apiKey, $apiSecret, $options = [], $env = 'production')
    {
        $this->request = new Request($apiKey, $apiSecret, $options);
        $this->env = $env;
    }

    public function __get($propertyName)
    {
        // For Users/Products/Orders/Events
        if (array_key_exists($propertyName, static::$modules) && is_null($this->{$propertyName})) {
            $this->{$propertyName} = new static::$modules[$propertyName]($this->request, $this->env);
        }

        return $this->{$propertyName};
    }
}
