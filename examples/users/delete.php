<?php

require_once dirname(dirname(__FILE__)) . '/config.php';
require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';

$userId = 'u1';

$datacue = new \DataCue\Client($apiKey, $apiSecret, $options, $env);

print_r("--- delete user begin ---\n");

$res = $datacue->users->delete($userId);

print_r("--- delete user response ---\n");

print_r($res);

print_r("--- delete user end ---\n");
