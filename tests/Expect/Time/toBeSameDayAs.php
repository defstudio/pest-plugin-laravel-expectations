<?php

use Carbon\Carbon;
use PHPUnit\Framework\ExpectationFailedException;

test('pass with string values', function () {
    expect('2021-01-01')->toBeSameDayAs('2021-01-01 22:55:00');
});

test('pass with datetime values', function () {
    expect(new DateTime('2021-01-01'))->toBeSameDayAs(new DateTime('2021-01-01 22:55:00'));
});

test('pass with carbon values', function () {
    expect(Carbon::make('2021-01-01'))->toBeSameDayAs(Carbon::make('2021-01-01 22:55:00'));
});

test('fails if value cannot be cast to carbon', function () {
    expect(['test'])->toBeSameDayAs(now());
})->throws(ExpectationFailedException::class, 'Impossible to cast [Array (...)] to a Carbon instance');

test('fails', function () {
    expect(new DateTime('2021-01-02'))->toBeSameDayAs(new DateTime('2021-01-01 22:55:00'));
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-01-02 00:00:00] is same day as 2021-01-01 22:55:00');

test('pass negated', function () {
    expect(now()->addDay())->not->toBeSameDayAs(now());
});

test('fails negated', function () {
    expect('2021-01-01')->not->toBeSameDayAs('2021-01-01 22:55:00');
})->throws(ExpectationFailedException::class);
