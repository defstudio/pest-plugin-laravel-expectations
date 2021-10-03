# A Pest plugin to add Laravel specific expectations

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

## Usage

The expectations added by this plugin are authomatically loaded into Pest's expectation system. They can be used along other expectations.

## Expectations

### `toBeCollection()`

Asserts that the value is an instance of \Illuminate\Support\Collection

```php
expect(collect[1,2,3])->toBeCollection();
 ```

### `toBeEloquentCollection()`

Asserts that the value is an instance of \Illuminate\Database\Eloquent\Collection

```php
expect(User::all())->toBeCollection();
 ```

### `toBeInDatabase()`

Asserts that the given _where condition_ exists in the database

```php
expect(['name' => 'Fabio'])->toBeInDatabase(table: 'users');
 ```

### `toExist()`

Asserts the given model exists in the database.

```php
expect($model)->toExist();
 ```

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

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
