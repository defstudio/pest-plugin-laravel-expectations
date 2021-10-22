---
title: Time Expectations
menuTitle: Time
description: ''
category: 'Expectations'
fullscreen: false
position: 10
---

### `toBeAfter()`

Assert the date is after the given one.

```php
expect('2021-10-20')->toBeAfter(today());
 ```

### `toBeBefore()`

Assert the date is before the given one.

```php
expect('2021-10-20')->toBeBefore(today());
 ```

### `toBeBetween()`

Assert the date is between the given ones.

```php
expect('2021-10-20')->toBeBetween(today(), today()->addWeek());
 ```

### `toBeCurrentMonth()`

Assert the date is in the current month.

```php
expect(now())->toBeCurrentMonth();
 ```

### `toBeCurrentYear()`

Assert the date is in the current year.

```php
expect(now())->toBeCurrentYear();
 ```

### `toBeFuture()`

Assert the date is in the future.

```php
expect(now()->addYear())->toBeFuture();
 ```

### `toBeLastYear()`

Assert the date is in the last year.

```php
expect(now()->subYear())->toBeLastYear();
 ```

### `toBeNextYear()`

Assert the date is in the next year.

```php
expect(now()->addYear())->toBeNextYear();
 ```

### `toBePast()`

Assert the date is in the past.

```php
expect(now()->subDay())->toBePast();
 ```

### `toBeSameDayAs()`

Assert the date is the same day as the given one.

```php
expect('2021-10-20')->toBeSameDayAs(today());
 ```

### `toBeSameHourAs()`

Assert the date is the same hour as the given one.

```php
expect('2021-10-20')->toBeSameMonthAs(today());
 ```

### `toBeSameMonthAs()`

Assert the date is the same hour as the given one.

```php
expect('2021-10-20')->toBeSameMonthAs(today());
 ```

### `toBeSameYearAs()`

Assert the date is the same year as the given one.

```php
expect('2020-10-20')->toBeSameMonthAs(today());
 ```

### `toBeSameWeekAs()`

Assert the date is the same week as the given one.

```php
expect('2020-10-20')->toBeSameWeekAs(today());
 ```
