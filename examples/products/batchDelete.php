<?php

require_once dirname(dirname(__FILE__)) . '/config.php';
require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';

$productAndVariantIdList = [
    [
        "product_id" => "p1",
        "variant_id" => "v1",
    ], [
        "product_id" => "p2",
        "variant_id" => "v2",
    ]
];

$datacue = new \DataCue\Client($apiKey, $apiSecret, $options, $env);

print_r("--- batch update product begin ---\n");

$res = $datacue->products->batchDelete($productAndVariantIdList);

print_r("--- batch update product response ---\n");

print_r($res);

print_r("--- batch update product end ---\n");
