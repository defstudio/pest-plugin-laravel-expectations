---
title: Storage Expectations
menuTitle: Storage
description: ''
category: 'Expectations'
fullscreen: false
position: 10
---

### `toExistInStorage()`

Assert that the given file exist in storage.

```php
expect('test_file.txt')->toExistInStorage();
 ```

 ### `toBeMissingInStorage()`

Assert that the given file does not exist in storage.

```php
expect('test_file.txt')->toBeMissingInStorage();
 ```
