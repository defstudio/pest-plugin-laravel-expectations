---
title: Responses Expectations
menuTitle: Responses
description: ''
category: 'Expectations'
fullscreen: false
position: 10
---

<alert type="info">**Note: this plugin wraps Responses to TestResponse, so expectations in this page can be used both with get()/post() calls and with object returned from response() helpers.</alert>



### `toBeDownload()`

Assert that the response offers a file download.

```php
expect(get('/reports/last.pdf'))->toBeDownload();
 ```

### `toBeForbidden()`

Assert that the response has a forbidden status code.

```php
expect(get('/secret'))->toBeForbidden();
 ```

### `toBeNotFound()`

Assert that the response has a not found status code.

```php
expect(get('/unknown'))->toBeNotFound();
 ```

### `toBeOk()`

Assert that the response has a 200 status code.

```php
expect(get('/page'))->toBeOk();
 ```

### `toBeRedirect()`

Assert that the response is a redirection.

```php
expect(get('/secret/location'))->toBeRedirect('/login');
 ```

### `toBeRedirectToSignedRoute()`

Assert whether the response is redirecting to a given signed route.

```php
expect(get('/secret/location'))->toBeRedirectToSignedRoute('login');
 ```

### `toBeSuccessful()`

Assert that the response has a successful status code.

```php
expect(get('/page'))->toBeSuccessful();
 ```

### `toBeUnauthorized()`

Assert that the response has an unauthorized status code.

```php
expect(get('/admin-area'))->toBeUnauthorized();
 ```

### `toConfirmCreation()`

Assert that the response has a 201 status code.

```php
expect(post('/comment'))->toConfirmCreation();
 ```

### `toContainText()`

alias for [`toRenderText()`](expectations/responses#torendertext)

```php
expect(get('/page'))->toContainText('title');
 ```

### `toContainTextInOrder()`

alias for [`toRenderTextInOrder()`](expectations/responses#torendertextinorder)

```php
expect(get('/page'))->toContainTextInOrder(['title', 'content']);
 ```

### `toHaveAllSession()`

Assert that the session has a given list of values.

```php
expect(get('/data'))->toHaveAllSession(['foo', 'bar']);
 ```

### `toHaveHeader()`

Assert that the response contains the given header and equals the optional value.

```php
expect(post('/users', $newUserData))->toHaveHeader('Location', '/user/11/edit');
 ```

### `toHaveInvalid()`

Assert that the response has the given validation error keys.

```php
expect(post('/register'), ['email' => 'taylor'])->toHaveInvalid(['email' => 'invalid email']);
 ```

### `toHaveLocation()`

Assert that the current location header matches the given URI.

```php
expect(get('/secret'))->toHaveLocation('/login');
 ```

### `toHaveMissingHeader()`

Assert that the response does not contain the given header.

```php
expect(get('/data'))->toHaveMissingHeader('baz');
 ```

### `toHaveNoContent()`

Assert that the response has the given status code and no content.

```php
expect(post('/timer/ping'))->toHaveNoContent();
 ```

### `toHaveSession()`

Assert that the session has a given value.

```php
expect(post('/users', $newUserData))->toHaveSession('success');
 ```

### `toHaveStatus()`

Assert that the response has the given status code.

```php
expect(post('/comment'))->toHaveStatus(201);
 ```

### `toHaveValid()`

Assert that the response doesn't have the given validation error keys.

```php
expect(post('/register'), ['email' => 'taylor@laravel.com'])->toHaveValid(['email']);
 ```

### `toHaveExactJson()`

Assert that the response has the exact given JSON.

```php
expect(get('/api/post/11'))->toHaveExactJson([
    'id' => 11,
    'title' => 'Test Post',
    'content' => "my content"
]);
 ```

### `toHaveJson()`

Assert that the response is a superset of the given JSON.

```php
expect(get('/api/post/11'))->toHaveJson(['id' => 11]);
 ```

### `toHaveJsonFragment()`

Assert that the response contains the given JSON fragment.

```php
expect(get('/api/post/11'))->toHaveJsonFragment([
        'tags' => ['hot', 'news']
]);
 ```

### `toHaveJsonPath()`

Assert that the expected value and type exists at the given path in the response.

```php
expect(get('/api/post/11'))->toHaveJsonPath('options.public', true);
 ```

### `toHaveJsonStructure()`

Assert that the response has a given JSON structure.

```php
expect(get('/api/post/11'))->toHaveJsonStructure(['options' => ['user']]);
 ```

### `toHaveJsonValidationErrors()`

Assert that the response has the given JSON validation errors.

```php
expect(post('/comments'))->toHaveJsonValidationErrors(['content' => 'content cannot be empty']);
 ```

### `toRender()`

Assert that the response contains the given string or array of strings.

```php
expect(get('/page'))->toRender('<h1>title</h1>');
 ```

### `toRenderInOrder()`

Assert that the response contains the given ordered sequence of strings.

```php
expect(get('/page'))->toRenderInOrder(['<h1>title</h1>', '<h3>section</h3>']);
 ```

### `toRenderText()`

Assert that the response contains the given string or array of strings in its text.

```php
expect(get('/page'))->toRenderText('title');
 ```

### `toRenderTextInOrder()`

Assert that the response contains the given ordered sequence of strings in its text.

```php
expect(get('/page'))->toRenderTextInOrder(['title', 'content'], escape: false);
 ```
