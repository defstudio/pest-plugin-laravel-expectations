![Pest Laravel Expectations](https://banners.beyondco.de/Pest%20Laravel%20Expectations.png?theme=light&packageManager=composer+require&packageName=--dev+defstudio%2Fpest-plugin-laravel-expectations&pattern=circuitBoard&style=style_2&description=Laravel+tailored+%40pestphp+expectations&md=1&showWatermark=0&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/defstudio/pest-plugin-laravel-expectations.svg?style=flat-square)](https://packagist.org/packages/defstudio/pest-plugin-laravel-expectations)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/def-studio/pest-plugin-laravel-expectations/Run%20Tests?label=tests)](https://github.com/def-studio/pest-plugin-laravel-expectations/actions?query=workflow%3A"Run+Tests"+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/def-studio/pest-plugin-laravel-expectations/Static%20Analysis?label=code%20style)](https://github.com/def-studio/pest-plugin-laravel-expectations/actions?query=workflow%3A"Static+Analysis"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/defstudio/pest-plugin-laravel-expectations.svg?style=flat-square)](https://packagist.org/packages/defstudio/pest-plugin-laravel-expectations)
[![License](https://img.shields.io/packagist/l/defstudio/pest-plugin-laravel-expectations)](https://packagist.org/packages/defstudio/pest-plugin-laravel-expectations)

This [Pest](https://pestphp.com) plugin adds Laravel specific expectations to the testing ecosystem

```php
it('can check model exists', function(){
  $user = User::factory()->create();
  
  expect($user)->toExist();
});
```

## Installation

You can install the package via composer:

```bash
composer require --dev defstudio/pest-plugin-laravel-expectations
```

The expectations added by this plugin are automatically loaded into Pest's expectation system. They can be used along other expectations.


## Documentation

A full documentation with a detailed list of **available expectations** is available at:

[https://def-studio.github.io/pest-plugin-laravel-expectations-docs](https://def-studio.github.io/pest-plugin-laravel-expectations-docs/)

## Autocompletion

For PhpStorm users, a nice Plugin has been developed by [Oliver Nybroe](https://github.com/olivernybroe). It adds full autocompletion to ours Laravel Expectations, it is worth to take a look: [https://github.com/pestphp/pest-intellij](https://github.com/pestphp/pest-intellij)


## Tests

Run all tests:
```bash
composer test
```

Check types:
```bash
composer test:types
```

Unit tests:
```bash
composer test:unit
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Fabio Ivona](https://github.com/def-studio)
- [All Contributors](../../contributors)

Please see the [contributing guide](https://def-studio.github.io/pest-plugin-laravel-expectations-docs/developers/contribute) for details on how to contribute to this plugin.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
