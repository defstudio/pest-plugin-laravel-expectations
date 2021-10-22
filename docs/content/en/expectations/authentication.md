---
title: Authentication Expectations
menuTitle: Authentication
description: ''
category: 'Expectations'
fullscreen: false
position: 10
---

### `toBeAbleTo()`

Assert that the given User is authorized to do something.

```php
expect($user)->toBeAbleTo('edit', $post);
 ```

### `toBeAuthenticated()`

Assert that the given User is authenticated.

```php
expect($user)->toBeAuthenticated();
 ```

### `toBeInvalidCredentials()`

Assert that the given credentials are invalid.

```php
expect(['email' => 'test@email.it', 'password' => 'wrongpassword'])->toBeInvalidCredentials();
 ```

### `toBeValidCredentials()`

Assert that the given credentials are valid.

```php
expect(['email' => 'test@email.it', 'password' => 'foo'])->toBeValidCredentials();
 ```
