<?php

require_once dirname(dirname(__FILE__)) . '/config.php';
require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';

$idList = ['c1', 'c2'];

$datacue = new \DataCue\Client($apiKey, $apiSecret, $options, $env);

print_r("--- batch delete categories begin ---\n");

$res = $datacue->categories->batchDelete($idList);

print_r("--- batch delete categories response ---\n");

print_r($res);

print_r("--- batch delete categories end ---\n");
