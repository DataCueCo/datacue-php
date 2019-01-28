<?php

require_once dirname(dirname(__FILE__)) . '/config.php';
require_once dirname(dirname(dirname(__FILE__))) . '/vendor/autoload.php';

$userDataList = [];

for ($i = 0; $i < 600; $i++) {
    $userDataList[] = [
        "user_id" => "u${i}",
        "email" => "xyz${i}@abc.com",
    ];
}

$datacue = new \DataCue\Client($apiKey, $apiSecret, $options, $env);

print_r("--- batch create user begin ---\n");

try {
    $res = $datacue->users->batchCreate($userDataList);
    print_r("--- batch create user response ---\n");
    print_r($res);
    print_r("--- batch create user end ---\n");
} catch (\DataCue\Exceptions\ExceedListDataSizeLimitationException $e) {
    print_r("--- batch create user throw ExceedListDataSizeLimitationException ---\n");
}
