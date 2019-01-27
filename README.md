# Installation

1. Download source code.

```
git clone https://github.com/DataCueCo/datacue-php.git
```

2. Generate autoload.

```
composer dump-autoload
```

# Configuration

Open file /examples/config.php , you can see and change the $options. All configuration items are optional.

```
$options = [
    'max_try_times' => 10,
    'pow_base' => 2,
    'debug' => true, // If true, some log info will be printed.
];
```

And fill in your $apiKey and $apiSecret.

# Publish

**You can change authors info in composer.json**

## How to publish

see https://packagist.org/

# Run test

## Products

### Create product

```
php examples/products/create.php
```

### Batch create products

```
php examples/products/batchCreate.php
```

### Update product

```
php examples/products/update.php
```


### Batch update products

```
php examples/products/batchUpdate.php
```

### Delete product

```
// delete all variants of product
php examples/products/deleteProduct.php
// just delete a variant of product
php examples/products/deleteVariant.php
```

### Batch delete product

```
php examples/products/batchDelete.php
```

## Users

### Create user

```
php examples/users/create.php
```

### Batch create users

```
php examples/users/batchCreate.php
```

### Update user

```
php examples/users/update.php
```

### Batch update users

```
php examples/users/batchUpdate.php
```

### Delete user

```
php examples/users/delete.php
```

### Batch delete users

```
php examples/users/batchDelete.php
```

## Orders

### Create order

```
php examples/orders/create.php
```

### Batch create orders

```
php examples/orders/batchCreate.php
```

### Cancel order

```
php examples/orders/cancel.php
```

### Batch cancel orders

```
php examples/orders/batchCancel.php
```

### Delete order

```
php examples/orders/delete.php
```

## Events

### Track event

```
php examples/events/track.php
```
