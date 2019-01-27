<?php

require_once dirname(dirname(__FILE__)) . '/config.php';
require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';

$userId = 'p1';
$userData = array(
    "profile" => array(
        "location" => "singapore"
    )
);

$datacue = new \DataCue\Client($apiKey, $apiSecret, $options, $env);

print_r("--- update user begin ---\n");

$res = $datacue->users->update($userId, $userData);

print_r("--- update user response ---\n");

print_r($res);

print_r("--- update user end ---\n");
