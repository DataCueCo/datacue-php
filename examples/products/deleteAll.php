<?php

require_once dirname(dirname(__FILE__)) . '/config.php';
require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';

$productId = 53;

$datacue = new \DataCue\Client($apiKey, $apiSecret, $options, $env);

print_r("--- delete all products begin ---\n");

$res = $datacue->products->deleteAll();

print_r("--- delete all products response ---\n");

print_r($res);

print_r("--- delete all products end ---\n");
