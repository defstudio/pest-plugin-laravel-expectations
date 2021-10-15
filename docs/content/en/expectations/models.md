---
title: Models Expectations
menuTitle: Models
description: ''
category: 'Expectations'
fullscreen: false
position: 10
---

### `toBeDeleted()`

Assert the given model to be deleted.

```php
expect($model)->toBeDeleted();
 ```

### `toBeSoftDeleted()`

Assert the given model to be soft deleted.

```php
expect($model)->toBeSoftDeleted();
 ```

### `toExist()`

Assert the given model exists in the database.

```php
expect($model)->toExist();
 ```

### `toBelongTo()`

Assert the given model belongs to another one.

```php
expect($post)->toBelongTo($user);
 ```

### `toOwn()`

Assert the given model owns child model.

```php
expect($user)->toOwn($post); //<-- HasMany relationship

expect($user)->toOwn($address); //<-- HasOne relationship
 ```
