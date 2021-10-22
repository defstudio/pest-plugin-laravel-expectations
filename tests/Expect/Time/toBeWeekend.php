<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect('2021-10-23')->toBeWeekend();
});

test('fails', function () {
    expect('2021-10-22')->toBeWeekend();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-10-22 00:00:00] is Saturday or Sunday');

test('pass negated', function () {
    expect('2021-10-22')->not->toBeWeekend();
});

test('fails negated', function () {
    expect('2021-10-23')->not->toBeWeekend();
})->throws(ExpectationFailedException::class);
