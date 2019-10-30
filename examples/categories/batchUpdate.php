<?php

require_once dirname(dirname(__FILE__)) . '/config.php';
require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';

$dataList = [
    [
        "category_id" => "c1",
        "name" => "category 1",
        "link" => "http://example.com/c1-link",
    ], [
        "category_id" => "c2",
        "name" => "category 2",
        "link" => "http://example.com/c2-link",
    ]
];

$datacue = new \DataCue\Client($apiKey, $apiSecret, $options, $env);

print_r("--- batch update categories begin ---\n");

$res = $datacue->categories->batchUpdate($dataList);

print_r("--- batch update categories response ---\n");

print_r($res);

print_r("--- batch update categories end ---\n");
