<?php

use Carbon\Carbon;
use PHPUnit\Framework\ExpectationFailedException;

test('pass with string values', function () {
    expect('2021-01-02 01:05:36')->toBe(new DateTime('2021-01-02 01:05:36'));
});

test('pass with string expectation', function () {
    expect(new DateTime('2021-01-02 01:05:36'))->toBe('2021-01-02 01:05:36');
});

test('pass with datetime values', function () {
    expect(new DateTime('2021-01-02 01:05:36'))->toBe(new DateTime('2021-01-02 01:05:36'));
});

test('pass with carbon values', function () {
    expect(Carbon::make('2021-01-02 01:05:36'))->toBe(Carbon::make('2021-01-02 01:05:36'));
});

test('fails', function () {
    expect(new DateTime('2021-01-01'))->toBe(new DateTime('2021-01-02'));
})->throws(ExpectationFailedException::class, 'Failed to assert that date [Fri Jan 01 2021 00:00:00 GMT+0000] is equal to [Sat Jan 02 2021 00:00:00 GMT+0000]');

test('pass negated', function () {
    expect(now())->not->toBe(now()->addHour());
});

test('fails negated', function () {
    expect(Carbon::make('2021-01-02'))->not->toBe(Carbon::make('2021-01-02'));
})->throws(ExpectationFailedException::class);
