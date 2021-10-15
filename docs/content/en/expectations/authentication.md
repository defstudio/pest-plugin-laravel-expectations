---
title: Authentication Expectations
menuTitle: Authentication
description: ''
category: 'Expectations'
fullscreen: false
position: 10
---

### `toBeAuthenticated()`

Assert that the given User is authenticated.

```php
expect($user)->toBeAuthenticated();
 ```

### `toBeValidCredentials()`

Assert that the given credentials are valid.

```php
expect(['email' => 'test@email.it', 'password' => 'foo'])->toBeValidCredentials();
 ```

### `toBeInvalidCredentials()`

Assert that the given credentials are invalid.

```php
expect(['email' => 'test@email.it', 'password' => 'wrongpassword'])->toBeInvalidCredentials();
 ```

### `toBeAbleTo()`

Assert that the given User is authorized to do something.

```php
expect($user)->toBeAbleTo('edit', $post);
 ```
