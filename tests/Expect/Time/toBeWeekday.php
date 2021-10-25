<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect('2021-10-22')->toBeWeekday();
});

test('fails', function () {
    expect('2021-10-23')->toBeWeekday();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-10-23 00:00:00] is a weekday');

test('pass negated', function () {
    expect('2021-10-23')->not->toBeWeekday();
});

test('fails negated', function () {
    expect('2021-10-22')->not->toBeWeekday();
})->throws(ExpectationFailedException::class);
