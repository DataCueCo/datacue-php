<?php

require_once dirname(dirname(__FILE__)) . '/config.php';
require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';

$userData = [
    "user_id" => "019mr8mf4r",
    "anonymous_id" => "07d35b1a-5776-4ddf-8f1c-dd0d2db9c502",
    "profile" => [
        "sex" => "female",
        "location" => "Santiago",
        "segment" => "platinum"
    ]
];
$eventData = [
    "type" => "pageview",
    "subtype" => "home",
];

$datacue = new \DataCue\Client($apiKey, $apiSecret, $options, $env);

print_r("--- track event begin ---\n");

$res = $datacue->events->track($userData, $eventData);

print_r("--- track event response ---\n");

print_r($res);

print_r("--- track event end ---\n");
