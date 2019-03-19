<?php

require_once dirname(dirname(__FILE__)) . '/config.php';
require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';

$datacue = new \DataCue\Client($apiKey, $apiSecret, $options, $env);

print_r("--- get exists IDs begin ---\n");

$res = $datacue->overview->getExistsIds('products');

print_r("--- get exists IDs response ---\n");

print_r($res);

print_r("--- get exists IDs end ---\n");
