<?php

require_once dirname(dirname(__FILE__)) . '/config.php';
require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';

$dataList = [
    [
        "category_id" => "c1",
        "name" => "category 1",
        "link" => "http://example.com/c1",
    ], [
        "category_id" => "c2",
        "name" => "category 2",
        "link" => "http://example.com/c2",
    ]
];

$datacue = new \DataCue\Client($apiKey, $apiSecret, $options, $env);

print_r("--- batch create categories begin ---\n");

$res = $datacue->categories->batchCreate($dataList);

print_r("--- batch create categories response ---\n");

print_r($res);

print_r("--- batch create categories end ---\n");
