<?php

require_once dirname(dirname(__FILE__)) . '/config.php';
require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';

$productDataList = [
    [
        "product_id" => "p1",
        "variant_id" => "v1",
        "category_1" => "men",
        "category_2" => "jeans",
        "category_3" => "skinny",
        "category_4" => "c4",
        "category_extra" => [
            "category_5" => "c5"
        ],
        "name" => "cool jeans",
        "brand" => "zara",
        "description" => "very fashionable jeans",
        "color" => "blue",
        "size" => "M",
        "price" => 25000,
        "full_price" => 30000,
        "stock" => 5,
        "extra" => [
            "extra_feature" => "details"
        ],
        "photo_url" => "https://s3.amazon.com/image.png",
        "link" => "/product/p1",
        "owner_id" => "user_id_3"
    ], [
        "product_id" => "p2",
        "variant_id" => "v2",
        "category_1" => "men",
        "category_2" => "jeans",
        "category_3" => "skinny",
        "category_4" => "c4",
        "category_extra" => [
            "category_5" => "c5"
        ],
        "name" => "hot jeans",
        "brand" => "zara",
        "description" => "very fashionable jeans",
        "color" => "black",
        "size" => "M",
        "price" => 25000,
        "full_price" => 30000,
        "stock" => 5,
        "extra" => [
            "extra_feature" => "details"
        ],
        "photo_url" => "https://s3.amazon.com/image.png",
        "link" => "/product/p2",
        "owner_id" => "user_id_3"
    ]
];

$datacue = new \DataCue\Client($apiKey, $apiSecret, $options, $env);

print_r("--- batch update product begin ---\n");

$res = $datacue->products->batchUpdate($productDataList);

print_r("--- batch update product response ---\n");

print_r($res);

print_r("--- batch update product end ---\n");
