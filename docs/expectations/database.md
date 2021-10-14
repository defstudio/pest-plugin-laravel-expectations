## Database Expectations

### `toBeInDatabase()`

Assert that the given _where condition_ exists in the database.

```php
expect(['name' => 'Fabio'])->toBeInDatabase(table: 'users');
 ```
