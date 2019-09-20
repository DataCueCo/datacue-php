<?php

require_once dirname(dirname(__FILE__)) . '/config.php';
require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';

$datacue = new \DataCue\Client($apiKey, $apiSecret, $options, $env);

print_r("--- get sync requirement begin ---\n");

$res = $datacue->client->sync();

print_r("--- get sync requirement response ---\n");

print_r(json_encode($res->getData()));

print_r("--- get sync requirement end ---\n");
