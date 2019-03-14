DataCue Integration Library
===========================

A library to enable content personalization with DataCue on your PHP based e-commerce store

Installation
------------

Use composer to manage your dependencies and download DataCue Client:

```bash
composer require datacue/client
```


# Usage

Please refer to our [developer documentation](https://developer.datacue.co) and switch to the PHP tab to see all examples.

Basic Usage
-----------
```php
<?php
use DataCue\Client;

$apikey = "your-api-key";
$apisecret = "your-api-secret";

$datacue = new Client(
    $apiKey,
    $apiSecret
);

$data = [
  "product_id" => "p1",
  "variant_id" => "v1",
  "main_category" => "jeans",
  "categories" => ["men","summer","jeans"],
  "name" => "cool jeans",
  "brand" => "zara",
  "description" => "very fashionable jeans",
  "color" => "blue",
  "size" => "M",
  "price" => 25000,
  "full_price" => 30000,
  "available" => True,
  "stock" => 5,
  "extra" => [
    "extra_feature" => "details"
  ],
  "photo_url" => "https://s3.amazon.com/image.png",
  "link" => "/product/p1",
  "owner_id" => "user_id_3"
];

$res = $datacue->products->create($data);
```

Advanced Usage
--------------

```php
$apikey = "your-api-key";
$apisecret = "your-api-secret";
$env = "staging"; //use our test servers to try your code, default is production

$options = [
    'max_try_times' => 10, //number of times to try resending if there was a failure
    'pow_base' => 2, //used to adjust exponential backoff, best to leave this setting untouched
    'debug' => true, // If true, additional debug info is printed to the console
];

$client = new Client(
    $apiKey,
    $apiSecret,
    $options,
    $env
);
```

Getting your credentials
------------------------
You can find your API key and secret in your [dashboard](https://app.datacue.co)

Don't have an account yet? [sign up here](https://app.datacue.co/en/sign-up)

Exceptions
----------

### ExceedBodySizeLimitationException

Ensure that the size of each payload does not exceed 5MB. If you receive this exception, break up your request into chunks smaller than 5MB and try again.

### ExceedListDataSizeLimitationException

Ensure that you don't see more than 500 items in a single batch request. If you receive this exception, break up your request into at least 500 per request and try again.
