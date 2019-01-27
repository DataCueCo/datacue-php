<?php

require_once dirname(dirname(__FILE__)) . '/config.php';
require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';

$orderId = 'o1';

$datacue = new \DataCue\Client($apiKey, $apiSecret, $options, $env);

print_r("--- cancel order begin ---\n");

$res = $datacue->orders->cancel($orderId);

print_r("--- cancel order response ---\n");

print_r($res);

print_r("--- cancel order end ---\n");
