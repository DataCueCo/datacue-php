<?php

require_once dirname(dirname(__FILE__)) . '/config.php';
require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';

$datacue = new \DataCue\Client($apiKey, $apiSecret, $options, $env);

print_r("--- clear client begin ---\n");

$res = $datacue->client->clear();

print_r("--- clear client response ---\n");

print_r($res);

print_r("--- clear client end ---\n");
