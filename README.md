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

The expectations added by this plugin are automatically loaded into Pest's expectation system. They can be used along other expectations.

## Expectations

### [Authentication](docs/expectations/authentication.md)

- [`toBeAuthenticated()`](docs/expectations/authentication.md#tobeauthenticated)
- [`toBeValidCredentials()`](docs/expectations/authentication.md#tobevalidcredentials)
- [`toBeInvalidCredentials()`](docs/expectations/authentication.md#tobeinvalidcredentials)
- [`toBeAbleTo()`](docs/expectations/authentication.md#tobeableto)

### [Collections](docs/expectations/collections.md)

- [`toBeCollection()`](docs/expectations/collections.md#tobecollection)
- [`toBeEloquentCollection()`](docs/expectations/collections.md#tobeeloquentcollection)


### [Models](docs/expectations/models.md)

- [`toBeDeleted()`](docs/expectations/models.md#tobedeleted)
- [`toBeSoftDeleted()`](docs/expectations/models.md#tobesoftdeleted)
- [`toExist()`](docs/expectations/models.md#toexist)
- [`toBelongTo()`](docs/expectations/models.md#tobelongto)
- [`toOwn()`](docs/expectations/models.md#toown)


### [Database](docs/expectations/database.md)

- [`toBeInDatabase()`](docs/expectations/database.md#tobeindatabase)



### [Response](docs/expectations/response.md)

- [`toBeSuccessful()`](docs/expectations/response.md#tobesuccessful)
- [`toBeRedirect()`](docs/expectations/response.md#toberedirect)
- [`toBeDownload()`](docs/expectations/response.md#tobedownload)
- [`toHaveStatus()`](docs/expectations/response.md#tohavestatus)
- [`toRenderInOrder()`](docs/expectations/response.md#torenderinorder)
- [`toRenderText()`](docs/expectations/response.md#torendertext)
- [`toRenderTextInOrder()`](docs/expectations/response.md#torendertextinorder)
- [`toContainText()`](docs/expectations/response.md#tocontaintext)
- [`toContainTextInOrder()`](docs/expectations/response.md#tocontaintextinorder)


### [Storage](docs/expectations/storage.md)

- [`toExistInStorage()`](docs/expectations/storage.md#toexistinstorage)


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

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
