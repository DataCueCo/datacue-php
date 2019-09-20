<?php

require_once dirname(dirname(__FILE__)) . '/config.php';
require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';

$orderId = 23;

$datacue = new \DataCue\Client($apiKey, $apiSecret, $options, $env);

print_r("--- delete all orders begin ---\n");

$res = $datacue->orders->deleteAll();

print_r("--- delete all orders response ---\n");

print_r($res);

print_r("--- delete all orders end ---\n");
