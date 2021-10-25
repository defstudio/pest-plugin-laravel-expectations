<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(now())->toBeToday();
});

test('fails', function () {
    expect('2999-01-01')->toBeToday();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2999-01-01 00:00:00] is today');

test('pass negated', function () {
    expect('2999-01-01')->not->toBeToday();
});

test('fails negated', function () {
    expect(now())->not->toBeToday();
})->throws(ExpectationFailedException::class);
