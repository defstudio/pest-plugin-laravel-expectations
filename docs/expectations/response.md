## Response Expectations

### `toBeSuccessful()`

Assert that the response has a successful status code.

```php
expect(get('/secret/location'))->toBeRedirect('/login');
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
expect(get('/page'))->toRender('<h1>title</h1>', escape: false);
 ```
