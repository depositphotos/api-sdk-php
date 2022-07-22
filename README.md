# Depositphotos PHP SDK

## Requirements

* PHP 7.1 or greater
* `ext-curl`
* `ext-json`

## Installation
The Depositphotos PHP SDK can be installed through Composer.

```bash
composer require depositphotos/api-sdk-php
```

## Usage

```php
require 'vendor/autoload.php';
```

```php
use Depositphotos\SDK\Client;
use Depositphotos\SDK\Resource\Regular\User\Request\LoginRequest;

$client = Client::createRegularClient('apiKey');

$request = new LoginRequest('username', 'password');
$response = $client->user()->login($request);

echo $response->getSessionId();
```

## Documentation
[**PHP SDK Docs**](https://github.com/depositphotos/api-sdk-php/wiki)

[**Regular API Docs**](https://api.depositphotos.com/doc2)

[**Enterprise API Docs**](https://api.depositphotos.com/doc)
