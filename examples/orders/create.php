<?php

require_once dirname(dirname(__FILE__)) . '/config.php';
require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';

$orderData = [
    "order_id" => "o1",
    "user_id" => "u1",
    "cart" => [
        ["product_id" => "p1", "variant_id" => "v1", "quantity" => 1, "unit_price" => 24, "currency" => "USD"],
        ["product_id" => "p2", "variant_id" => "v2", "quantity" => 9, "unit_price" => 42, "currency" => "USD"],
    ],
    "timestamp" => "2018-04-04 23:29:04Z",
];

$datacue = new \DataCue\Client($apiKey, $apiSecret, $options, $env);

print_r("--- create order begin ---\n");

$res = $datacue->orders->create($orderData);

print_r("--- create order response ---\n");

print_r($res);

print_r("--- create order end ---\n");
