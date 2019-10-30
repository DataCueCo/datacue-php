<?php

require_once dirname(dirname(__FILE__)) . '/config.php';
require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';

$id = 'c3';
$data = [
    "name" => "category 3",
    "link" => "http://example.com/c3-link",
];

$datacue = new \DataCue\Client($apiKey, $apiSecret, $options, $env);

print_r("--- update category begin ---\n");

$res = $datacue->categories->update($id, $data);

print_r("--- update category response ---\n");

print_r($res);

print_r("--- update category end ---\n");
