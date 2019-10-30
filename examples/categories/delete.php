<?php

require_once dirname(dirname(__FILE__)) . '/config.php';
require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';

$id = 'c3';

$datacue = new \DataCue\Client($apiKey, $apiSecret, $options, $env);

print_r("--- delete category begin ---\n");

$res = $datacue->categories->delete($id);

print_r("--- delete category response ---\n");

print_r($res);

print_r("--- delete category end ---\n");
