<?php

use Carbon\Carbon;
use DefStudio\PestLaravelExpectations\Exceptions\InvalidDataException;
use PHPUnit\Framework\ExpectationFailedException;

test('pass with string values', function () {
    expect('2021-01-01 22:50:01')->toBeSameHourAs('2021-01-01 22:55:00');
});

test('pass with datetime values', function () {
    expect(new DateTime('2021-01-01 22:50:01'))->toBeSameHourAs(new DateTime('2021-01-01 22:55:00'));
});

test('pass with carbon values', function () {
    expect(Carbon::make('2021-01-01 22:50:01'))->toBeSameHourAs(Carbon::make('2021-01-01 22:55:00'));
});

test('fails if value cannot be cast to carbon', function () {
    expect(['test'])->toBeSameHourAs(now());
})->throws(InvalidDataException::class, 'Cannot cast');

test('fails', function () {
    expect(new DateTime('2021-01-01 23:55:00'))->toBeSameHourAs(new DateTime('2021-01-01 22:55:00'));
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-01-01 23:55:00] is same hour as 2021-01-01 22:55:00');

test('pass negated', function () {
    expect(now()->addDay())->not->toBeSameHourAs(now());
});

test('fails negated', function () {
    expect('2021-01-01 22:50:01')->not->toBeSameHourAs('2021-01-01 22:55:00');
})->throws(ExpectationFailedException::class);
