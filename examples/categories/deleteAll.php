<?php

require_once dirname(dirname(__FILE__)) . '/config.php';
require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';

$datacue = new \DataCue\Client($apiKey, $apiSecret, $options, $env);

print_r("--- delete all categories begin ---\n");

$res = $datacue->categories->deleteAll();

print_r("--- delete all categories response ---\n");

print_r($res);

print_r("--- delete all categories end ---\n");
