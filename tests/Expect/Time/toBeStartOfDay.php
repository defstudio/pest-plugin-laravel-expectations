<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect('2021-10-18 00:00:00')->toBeStartOfDay();
});

test('fails', function () {
    expect('2021-10-19 03:00:00')->toBeStartOfDay();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-10-19 03:00:00] is start of day');

test('pass negated', function () {
    expect('2021-10-19 03:00:00')->not->toBeStartOfDay();
});

test('fails negated', function () {
    expect('2021-10-18 00:00:00')->not->toBeStartOfDay();
})->throws(ExpectationFailedException::class);
