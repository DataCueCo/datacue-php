<?php

require_once dirname(dirname(__FILE__)) . '/config.php';
require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';

$productId = 'p1';
$variantId = 'v1';
$productData = [
    "category_1" => "men",
    "category_2" => "jeans",
    "category_3" => "skinny",
    "stock" => 6,
    "available" => false,
];

$datacue = new \DataCue\Client($apiKey, $apiSecret, $options, $env);

print_r("--- update product begin ---\n");

$res = $datacue->products->update($productId, $variantId, $productData);

print_r("--- update product response ---\n");

print_r($res);

print_r("--- update product end ---\n");
