# Call the TimeChimp API with a breeze
[![Latest Version on Packagist](https://img.shields.io/packagist/v/guapa/timechimp-sdk.svg?style=flat-square)](https://packagist.org/packages/guapa/timechimp-sdk)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build Status](https://travis-ci.org/guapa-ecommerce/timechimp-sdk.svg?branch=master)](https://travis-ci.org/guapa-ecommerce/timechimp-sdk)
[![Quality Score](https://img.shields.io/scrutinizer/g/guapa-ecommerce/timechimp-sdk.svg?style=flat-square)](https://scrutinizer-ci.com/g/guapa-ecommerce/timechimp-sdk)
[![Total Downloads](https://img.shields.io/packagist/dt/guapa/timechimp-sdk.svg?style=flat-square)](https://packagist.org/packages/guapa/timechimp-sdk)

This is a package that allows you to call the API of [TimeChimp](https://www.timechimp.com/), please see their [documentation](https://timechimp.docs.apiary.io/#) for more information 

## Installation
You can install the package via compose:
```bash
composer require guapa/timechimp-sdk
```

## Usage
To use this package you need to instantiate a new request like so:

```php
<?php

$request = new \Guapa\TimeChimp\UsersRequest;
$request->setAccessToken('abcde');

/** @var \GuzzleHttp\Psr7\Response $response */
$response = $request->getAll();

$users = json_decode($response->getBody(), true);
```

You need to add the access token after creating the instance of the request. This is done so the requests can be loaded using Dependency Injection

Available requests are:
- Customers
- Expenses
- Invoices
- Mileage
- Projects
- Project notes
- Time entries
- Users

See the official documentation for more information: https://timechimp.docs.apiary.io/#

## Credits

- [Robert-John van Doesburg](https://github.com/rjvandoesburg)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.