<?php

require_once dirname(dirname(__FILE__)) . '/config.php';
require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';

$data = [
    "category_id" => "c3",
    "name" => "category 3",
    "link" => "http://example.com/c3",
];

$datacue = new \DataCue\Client($apiKey, $apiSecret, $options, $env);

print_r("--- create category begin ---\n");

$res = $datacue->categories->create($data);

print_r("--- create category response ---\n");

print_r($res);

print_r("--- create category end ---\n");
