<?php

require_once dirname(dirname(__FILE__)) . '/config.php';
require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';

$productId = 'p1';

$datacue = new \DataCue\Client($apiKey, $apiSecret, $options, $env);

print_r("--- delete product begin ---\n");

$res = $datacue->products->delete($productId);

print_r("--- delete product response ---\n");

print_r($res);

print_r("--- delete product end ---\n");
