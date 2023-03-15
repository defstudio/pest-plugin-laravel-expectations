---
title: Exceptions Expectations
menuTitle: Exceptions
description: ''
category: 'Expectations'
fullscreen: false
position: 10
---

### `toThrowValidationException()` (available from v2, still with v1? Upgrade!)

Assert that the given closure throws an `Illuminate\Validation\ValidationException`

```php
expect(fn() => $request->validate(/* rules */))->toThrowValidationException();
```

additionally, validation errors can be checked:

```php
expect(fn() => $request->validate(/* rules */))
    ->toThrowValidationException([
        'field1' => ['field 1 is required'],
        'user.email' => ['user email must be a valid email address'],
    ]);
```
