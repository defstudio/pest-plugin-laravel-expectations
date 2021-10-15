---
title: Collections Expectations
menuTitle: Collections
description: ''
category: 'Expectations'
fullscreen: false
position: 10
---

### `toBeCollection()`

Assert that the value is an instance of \Illuminate\Support\Collection.

```php
expect(collect[1,2,3])->toBeCollection();
 ```

### `toBeEloquentCollection()`

Assert that the value is an instance of \Illuminate\Database\Eloquent\Collection.

```php
expect(User::all())->toBeCollection();
 ```
