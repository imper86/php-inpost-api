# Inpost ShipX PHP SDK

## Installation

```sh
composer require imper86/php-inpost-api
```

### HTTPlug note
This lib uses [HTTPlug](https://github.com/php-http/httplug)
so it doesn't depend on any http client. In order to use this
lib you must have some [PSR-18 http client](https://www.php-fig.org/psr/psr-18)
and [PSR-17 http factories](https://www.php-fig.org/psr/psr-17).
If you don't know which one you shoud install you can require
these:

```sh
composer require php-http/guzzle6-adapter http-interop/http-factory-guzzle
```

## Usage
Using this library is very simple, fast example should be enough
to understand how it works.

```php
use Imper86\PhpInpostApi\InpostApi;
use Imper86\PhpInpostApi\Plugin\AcceptLanguagePlugin;

// if you want to use all resources you must ask Inpost for
// access token via their contact form
// https://inpost.pl/formularz-wsparcie
$token = 'aaaa.aaaa';

// create api client
$api = new InpostApi($token);

// this library provides optional Plugin for localizing
// error messages

$api->addPlugin(new AcceptLanguagePlugin('pl_PL'));

// from now you can use these api methods:
$api->addressBooks()->(...);
$api->batches()->(...);
$api->dispatchOrders()->(...);
$api->dispatchPoints()->(...);
$api->mpks()->(...);
$api->organizations()->(...);
$api->points()->(...);
$api->sendingMethods()->(...);
$api->services()->(...);
$api->shipments()->(...);
$api->shipmentTemplates()->(...);
$api->statuses()->(...);
$api->tracking()->(...);

// fast example:
var_dump($api->organizations()->shipments()->get('1234'));
```

If you use IDE with typehinting such as PHPStorm, you'll easily 
figure it out. If not, please 
[take a look in Resource directory](src/Resource)

## Examples
If you still wonder how to use this lib, checkout example
php scripts:

* [Create shipment and generate label](examples/create_shipment.php)

## Contributing
Any help will be very appreciated :)
