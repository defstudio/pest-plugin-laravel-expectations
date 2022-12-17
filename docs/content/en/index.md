---
title: 'Pest Laravel Expectations'
menuTitle: 'Introduction'
description: 'Laravel tailored @pestphp expectations for web artisans'
position: 1
fullscreen: true
---

<img src="https://banners.beyondco.de/Pest%20Laravel%20Expectations.png?theme=light&packageManager=composer+require&packageName=--dev+defstudio%2Fpest-plugin-laravel-expectations&pattern=circuitBoard&style=style_2&description=Laravel+tailored+%40pestphp+expectations&md=1&showWatermark=0&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg" class="light-img" alt=""/>
<img src="https://banners.beyondco.de/Pest%20Laravel%20Expectations.png?theme=dark&packageManager=composer+require&packageName=--dev+defstudio%2Fpest-plugin-laravel-expectations&pattern=circuitBoard&style=style_2&description=Laravel+tailored+%40pestphp+expectations&md=1&showWatermark=0&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg" class="dark-img"  alt=""/>


<a href="https://packagist.org/packages/defstudio/pest-plugin-laravel-expectations" target="_blank">
    <img style="display: inline-block; margin-top: 0.5em; margin-bottom: 0.5em" src="https://img.shields.io/packagist/v/defstudio/pest-plugin-laravel-expectations.svg?style=flat-square" alt="Latest Version on Packagist">
</a>

<a href="https://github.com/defstudio/pest-plugin-laravel-expectations/actions?query=workflow%3A'Run+Tests'+branch%3Amaster" target="_blank">
    <img style="display: inline-block; margin-top: 0.5em; margin-bottom: 0.5em" src="https://img.shields.io/github/actions/workflow/status/defstudio/pest-plugin-laravel-expectations/tests.yml?branch=main&label=tests" alt="GitHub Tests Action Status">
</a>

<a href="https://github.com/defstudio/pest-plugin-laravel-expectations/actions?query=workflow%3A'Static+Analysis'+branch%3Amaster" target="_blank">
    <img style="display: inline-block; margin-top: 0.5em; margin-bottom: 0.5em" src="https://img.shields.io/github/workflow/status/defstudio/pest-plugin-laravel-expectations/static.yml?branch=master&label=code%20style" alt="GitHub Code Style Action Status">
</a>

<a href="https://packagist.org/packages/defstudio/pest-plugin-laravel-expectations" target="_blank">
    <img style="display: inline-block; margin-top: 0.5em; margin-bottom: 0.5em" src="https://img.shields.io/packagist/dt/defstudio/pest-plugin-laravel-expectations.svg?style=flat-square" alt="Total Downloads">
</a>

<a href="https://packagist.org/packages/defstudio/pest-plugin-laravel-expectations" target="_blank">
    <img style="display: inline-block; margin-top: 0.5em; margin-bottom: 0.5em" src="https://img.shields.io/packagist/l/defstudio/pest-plugin-laravel-expectations" alt="License">
</a>


#### Easily add Laravel specific expectations to your [Pest](https://pestphp.com) testing ecosystem


```php
it('can check model exists', function(){
  $user = User::factory()->create();
  
  expect($user)->toExist();
});
```

```php
test('user can edit a post', function(){
  $user = User::factory()->create();
  
  expect($user)->toBeAbleTo('edit', $post);
});
```

```php
test('home is rendered', function () {
    $response = get('/home');

    expect($response)->toBeSuccessful();
});
```

Get the full source code at [https://github.com/defstudio/pest-plugin-laravel-expectations](https://github.com/defstudio/pest-plugin-laravel-expectations)


This plugin is powered by [def:studio](https://github.com/defstudio)
