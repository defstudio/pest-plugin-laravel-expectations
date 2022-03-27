---
title: Views Expectations
menuTitle: Views
description: ''
category: 'Expectations'
fullscreen: false
position: 10
---

### `toBeView()`

Assert that the value is an instance of \Illuminate\View\View with the given name.

```php
expect(view('page'))->toBeView('page');
 ```

It can optionally check that the array was given to the view.
```php

    expect(view('page')->with('data', 42))
        ->toBeView('page', ['data' => 42]);


 ```



