<?php

require_once dirname(dirname(__FILE__)) . '/config.php';
require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';

$userIdList = ['u1', 'u2'];

$datacue = new \DataCue\Client($apiKey, $apiSecret, $options, $env);

print_r("--- batch update user begin ---\n");

$res = $datacue->users->batchDelete($userIdList);

print_r("--- batch update user response ---\n");

print_r($res);

print_r("--- batch update user end ---\n");
