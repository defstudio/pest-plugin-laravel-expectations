<?php

use Carbon\Carbon;
use DefStudio\PestLaravelExpectations\Exceptions\InvalidDataException;
use PHPUnit\Framework\ExpectationFailedException;

test('pass with string values', function () {
    expect('2021-01-02')->toBeAfter('2021-01-01 22:55:00');
});

test('pass with datetime values', function () {
    expect(new DateTime('2021-01-02'))->toBeAfter(new DateTime('2021-01-01 22:55:00'));
});

test('pass with carbon values', function () {
    expect(Carbon::make('2021-01-02'))->toBeAfter(Carbon::make('2021-01-01 22:55:00'));
});

test('fails if value cannot be cast to carbon', function () {
    expect(['test'])->toBeAfter(now());
})->throws(InvalidDataException::class, 'Cannot cast [[...]] to a Carbon\Carbon instance');

test('fails', function () {
    expect(new DateTime('2021-01-01'))->toBeAfter(new DateTime('2021-01-01 22:55:00'));
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-01-01 00:00:00] is after 2021-01-01 22:55:00');

test('pass negated', function () {
    expect(now())->not->toBeAfter(now()->addHour());
});

test('fails negated', function () {
    expect('2021-01-02')->not->toBeAfter('2021-01-01 22:55:00');
})->throws(ExpectationFailedException::class);
