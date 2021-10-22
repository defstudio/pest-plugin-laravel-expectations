<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(now()->addMonth())->toBeNextMonth();
});

test('fails', function () {
    expect('2999-01-01')->toBeNextMonth();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2999-01-01 00:00:00] is in the next month');

test('pass negated', function () {
    expect('2999-01-01')->not->toBeNextMonth();
});

test('fails negated', function () {
    expect(now()->addMonth())->not->toBeNextMonth();
})->throws(ExpectationFailedException::class);
