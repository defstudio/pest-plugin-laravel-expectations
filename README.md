![Pest Laravel Expectations](https://banners.beyondco.de/Pest%20Laravel%20Expectations.png?theme=light&packageManager=composer+require&packageName=--dev+defstudio%2Fpest-plugin-laravel-expectations&pattern=circuitBoard&style=style_2&description=Laravel+tailored+%40pestphp+expectations&md=1&showWatermark=0&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/defstudio/pest-plugin-laravel-expectations.svg?style=flat-square)](https://packagist.org/packages/defstudio/pest-plugin-laravel-expectations)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/defstudio/pest-plugin-laravel-expectations/tests.yml?branch=master&label=tests)](https://github.com/defstudio/pest-plugin-laravel-expectations/actions?query=workflow%3A"Run+Tests"+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/defstudio/pest-plugin-laravel-expectations/static.yml?branch=master&label=code%20style)](https://github.com/defstudio/pest-plugin-laravel-expectations/actions?query=workflow%3A"Static+Analysis"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/defstudio/pest-plugin-laravel-expectations.svg?style=flat-square)](https://packagist.org/packages/defstudio/pest-plugin-laravel-expectations)
[![License](https://img.shields.io/packagist/l/defstudio/pest-plugin-laravel-expectations)](https://packagist.org/packages/defstudio/pest-plugin-laravel-expectations)
<a href="https://twitter.com/FabioIvona?ref_src=twsrc%5Etfw"><img alt="Twitter Follow" src="https://img.shields.io/twitter/follow/FabioIvona?label=Follow&style=social"></a>

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
composer require --dev defstudio/pest-plugin-laravel-11.expectations
```

The expectations added by this plugin are automatically loaded into Pest's expectation system. They can be used along other expectations.


## Documentation

A full documentation with a detailed list of **available expectations** can be found at:

[https://defstudio.github.io/pest-plugin-laravel-expectations](https://defstudio.github.io/pest-plugin-laravel-expectations/)

## Autocompletion

For PhpStorm users, a nice Plugin has been developed by [Oliver Nybroe](https://github.com/olivernybroe). It adds full autocompletion to ours Laravel Expectations, it is worth to take a look: [https://github.com/pestphp/pest-intellij](https://github.com/pestphp/pest-intellij)

## Changelog

All notable changes to this project in our [changelog](https://defstudio.github.io/pest-plugin-laravel-expectations/changelog). For a full understanding of what changed and the PR that where merged, see also the [releases page](https://defstudio.github.io/pest-plugin-laravel-expectations/releases)

The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).

## Credits

- [Fabio Ivona](https://github.com/fabio-ivona)
- [All Contributors](../../contributors)

Please see the [contributing guide](https://defstudio.github.io/pest-plugin-laravel-expectations/developers/contribute) for details on how to contribute to this plugin.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
