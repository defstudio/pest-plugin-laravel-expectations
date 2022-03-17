---
title: Views Expectations
menuTitle: Views
description: ''
category: 'Expectations'
fullscreen: false
position: 10
---

### `toBeView()`

Assert that the value is an instance of \Illuminate\View\View, also name and data is identical with data passed.

```php
expect(view('page'))->toBeView('page');
 ```

```php
expect(view('page')->with('data', 'foo'))->toBeView('page', ['data']);
 ```



