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

### `toBeBirthday()`

Assert the date a birthday.

```php
expect('2021-10-20')->toBeBirthday('1985-10-20');
 ```

### `toBeCurrentDay()`

Assert the date is today.

```php
expect(now())->toBeCurrentDay();
 ```

### `toBeCurrentMonth()`

Assert the date is in the current month.

```php
expect(now())->toBeCurrentMonth();
 ```

### `toBeCurrentWeek()`

Assert the date is in the current week.

```php
expect(now())->toBeCurrentWeek();
 ```

### `toBeCurrentYear()`

Assert the date is in the current year.

```php
expect(now())->toBeCurrentYear();
 ```

### `toBeEndOfDay()`

Assert the date is end of day.

```php
expect(now())->toBeEndOfDay();
 ```

### `toBeFuture()`

Assert the date is in the future.

```php
expect(now()->addYear())->toBeFuture();
 ```

### `toBeFriday()`

Assert the date is Friday.

```php
 expect('2021-10-23')->toBeFriday();
 ```

### `toBeLastMonth()`

Assert the date is in the last month.

```php
expect(now()->subMonth())->toBeLastMonth();
 ```

### `toBeLastWeek()`

Assert the date is in the last week.

```php
expect(now()->subWeek())->toBeLastWeek();
 ```

### `toBeLastYear()`

Assert the date is in the last year.

```php
expect(now()->subYear())->toBeLastYear();
 ```

### `toBeMidday()`

Assert the date is midday.

```php
expect(now()->subYear())->toBeLastYear();
 ```

### `toBeMonday()`

Assert the date is Monday.

```php
 expect('2021-10-19')->toBeMonday();
 ```

### `toBeNextMonth()`

Assert the date is in the next month.

```php
expect(now()->addMonth())->toBeNextMonth();
 ```

### `toBeNextWeek()`

Assert the date is in the next week.

```php
expect(now()->addWeek())->toBeNextWeek();
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

### `toBeSaturday()`

Assert the date is Saturday.

```php
 expect('2021-10-24')->toBeSaturday();
 ```

### `toBeSunday()`

Assert the date is Sunday.

```php
 expect('2021-10-25')->toBeSunday();
 ```

### `toBeToday()`

alias for [`toBeCurrentDay()`](expectations/time#tobecurrentday)

```php
 expect(now())->toBeToday();
 ```

### `toBeTuesday()`

Assert the date is Tuesday.

```php
 expect('2021-10-20')->toBeTuesday();
 ```

### `toBeThursday()`

Assert the date is Thursday.

```php
 expect('2021-10-22')->toBeThursday();
 ```

### `toBeWeekday()`

Assert the date is a weekday (between monday and friday).

```php
expect('2020-10-22')->toBeWeekday();
 ```

### `toBeWeekend()`

Assert the date is Saturday or Sunday.

```php
expect('2020-10-23')->toBeWeekend();
 ```

### `toBeWednesday()`

Assert the date is Wednesday.

```php
 expect('2021-10-21')->toBeWednesday();
 ```
