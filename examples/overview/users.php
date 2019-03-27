<?php

require_once dirname(dirname(__FILE__)) . '/config.php';
require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';

$datacue = new \DataCue\Client($apiKey, $apiSecret, $options, $env);

print_r("--- get existing user IDs begin ---\n");

$res = $datacue->overview->users();

print_r("--- get existing user IDs response ---\n");

print_r($res);

print_r("--- get existing user IDs end ---\n");
