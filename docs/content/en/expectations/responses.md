---
title: Responses Expectations
menuTitle: Responses
description: ''
category: 'Expectations'
fullscreen: false
position: 10
---

### `toBeSuccessful()`

Assert that the response has a successful status code.

```php
expect(get('/page'))->toBeSuccessful();
 ```

### `toBeOk()`

Assert that the response has a 200 status code.

```php
expect(get('/page'))->toBeOk();
 ```

### `toBeNotFound()`

Assert that the response has a not found status code.

```php
expect(get('/unknown'))->toBeNotFound();
 ```

### `toBeForbidden()`

Assert that the given response has a forbidden status code.

```php
expect(get('/secret'))->toBeForbidden();
 ```

### `toBeUnauthorized()`

Assert that the given response has an unauthorized status code.

```php
expect(get('/admin-area'))->toBeUnauthorized();
 ```

### `toHaveNoContent()`

Assert that the response has the given status code and no content.

```php
expect(post('/timer/ping'))->toHaveNoContent();
 ```

### `toBeRedirect()`

Assert that the given response is a redirection.

```php
expect(get('/secret/location'))->toBeRedirect('/login');
 ```

### `toBeDownload()`

Assert that the given response offers a file download.

```php
expect(get('/reports/last.pdf'))->toBeDownload();
 ```

### `toHaveStatus()`

Assert that the given response has a specific status code.

```php
expect(post('/comment'))->toHaveStatus(201);
 ```

### `toRender()`

Assert that the given response contains a string or array of strings.

```php
expect(get('/page'))->toRender('<h1>title</h1>');
 ```

### `toRenderInOrder()`

Assert that the given response contains an ordered sequence of strings.

```php
expect(get('/page'))->toRenderInOrder(['<h1>title</h1>', '<h3>section</h3>']);
 ```

### `toRenderText()`

Assert that the given response contains a string or array of strings in its text.

```php
expect(get('/page'))->toRender('title');
 ```

### `toRenderTextInOrder()`

Assert that the given response contains an ordered sequence of strings in its text.

```php
expect(get('/page'))->toRenderInOrder(['title', 'content'], escape: false);
 ```

### `toContainText()`

alias for [`toRenderText()`](expectations/responses#torendertext)

### `toContainTextInOrder()`

alias for [`toRenderTextInOrder()`](expectations/responses#torendertextinorder)
