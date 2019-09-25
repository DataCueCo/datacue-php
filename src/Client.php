<?php

namespace DataCue;

use DataCue\Core\Request;
use DataCue\Core\Headers;
use DataCue\Modules\Product;
use DataCue\Modules\User;
use DataCue\Modules\Order;
use DataCue\Modules\Event;
use DataCue\Modules\Overview;
use DataCue\Modules\Client as ClientModule;

/**
 * Class Client
 * @package DataCue
 */
class Client
{
    /**
     * @var null|string
     */
    private static $version = null;

    private static $modules = [
        'products' => Product::class,
        'users' => User::class,
        'orders' => Order::class,
        'events' => Event::class,
        'overview' => Overview::class,
        'client' => ClientModule::class,
    ];

    public static function setIntegrationAndVersion($integration, $version)
    {
        Headers::setHeader('X-DataCue-Integration', $integration);
        Headers::setHeader('X-DataCue-Integration-Version', $version);
    }

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
     * @var \DataCue\Modules\Overview|null
     */
    private $overview = null;

    /**
     * @var \DataCue\Modules\Client|null
     */
    private $client = null;

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

        if (is_null(static::$version)) {
            $packageInfo = json_decode(file_get_contents(__DIR__ . '/../composer.json'));
            static::$version = $packageInfo->version;
            Headers::setHeader('X-DataCue-PHP-Library-Version', static::$version);
        }
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
