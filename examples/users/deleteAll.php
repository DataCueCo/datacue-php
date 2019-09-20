<?php

require_once dirname(dirname(__FILE__)) . '/config.php';
require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';

$userId = 1;

$datacue = new \DataCue\Client($apiKey, $apiSecret, $options, $env);

print_r("--- delete all users begin ---\n");

$res = $datacue->users->deleteAll();

print_r("--- delete all users response ---\n");

print_r($res);

print_r("--- delete all users end ---\n");
