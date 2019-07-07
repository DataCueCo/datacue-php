<?php

require_once dirname(dirname(__FILE__)) . '/config.php';
require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';

$datacue = new \DataCue\Client($apiKey, $apiSecret, $options, $env);

print_r("--- get existing product IDs begin ---\n");

$res = $datacue->overview->products();

print_r("--- get existing product IDs response ---\n");

print_r($res);

print_r("--- get existing product IDs end ---\n");
