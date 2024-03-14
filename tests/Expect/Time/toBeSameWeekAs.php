<?php

use Carbon\Carbon;
use DefStudio\PestLaravelExpectations\Exceptions\InvalidDataException;
use PHPUnit\Framework\ExpectationFailedException;

test('pass with string values', function () {
    expect('2021-01-01')->toBeSameWeekAs('2021-01-03 22:55:00');
});

test('pass with datetime values', function () {
    expect(new DateTime('2021-01-01'))->toBeSameWeekAs(new DateTime('2021-01-03 22:55:00'));
});

test('pass with carbon values', function () {
    expect(Carbon::make('2021-01-01'))->toBeSameWeekAs(Carbon::make('2021-01-03 22:55:00'));
});

test('fails if value cannot be cast to carbon', function () {
    expect(['test'])->toBeSameWeekAs(now());
})->throws(InvalidDataException::class, 'Cannot cast [[...]] to a Carbon\Carbon instance');

test('fails', function () {
    expect(new DateTime('2021-01-01'))->toBeSameWeekAs(new DateTime('2021-01-04 22:55:00'));
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-01-01 00:00:00] is same week as 2021-01-04 22:55:00');

test('pass negated', function () {
    expect(now()->addWeek())->not->toBeSameWeekAs(now());
});

test('fails negated', function () {
    expect('2021-01-01')->not->toBeSameWeekAs('2021-01-02 22:55:00');
})->throws(ExpectationFailedException::class);
