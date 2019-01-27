<?php

require_once dirname(dirname(__FILE__)) . '/config.php';
require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';

$userDataList = [
    [
        "user_id" => "u1",
        "email" => "wxyz@abc.com",
    ], [
        "user_id" => "u2",
        "email" => "abcd@abc.com",
    ]
];

$datacue = new \DataCue\Client($apiKey, $apiSecret, $options, $env);

print_r("--- batch create user begin ---\n");

$res = $datacue->users->batchUpdate($userDataList);

print_r("--- batch create user response ---\n");

print_r($res);

print_r("--- batch create user end ---\n");
