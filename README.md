# Call the TimeChimp API with a breeze
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

/** @var \GuzzleHttp\Psr7\Response $response */
$response = $request->getAll();

$users = json_decode($response->getBody(), true);
```

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

Special thanks for Spatie for their guidelines and their packages as an inspiration
- [Spatie](https://spatie.be)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.