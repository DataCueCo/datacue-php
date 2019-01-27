<?php

require_once dirname(dirname(__FILE__)) . '/config.php';
require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';

$userData = [
    "user_id" => "u1",
    "email" => "xyz@abc.com",
    "title" => "Mr",
    "first_name" => "John",
    "last_name" => "Smith",
    "profile" => [
        "location" => "santiago",
        "sex" => "male",
        "segment" => "platinum"
    ],
    "wishlist" => ["P1", "P3", "P4"], //array of product ids
    "email_subscriber" => true,
    "timestamp" => "2018-04-04 23:29:04-03:00",
];

$datacue = new \DataCue\Client($apiKey, $apiSecret, $options, $env);

print_r("--- create user begin ---\n");

$res = $datacue->users->create($userData);

print_r("--- create user response ---\n");

print_r($res);

print_r("--- create user end ---\n");
