<?php

require_once dirname(dirname(__FILE__)) . '/config.php';
require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';

$orderIdList = ['o1', 'o2'];

$datacue = new \DataCue\Client($apiKey, $apiSecret, $options, $env);

print_r("--- batch cancel order begin ---\n");

$res = $datacue->orders->batchCancel($orderIdList);

print_r("--- batch cancel order response ---\n");

print_r($res);

print_r("--- batch cancel order end ---\n");
