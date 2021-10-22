<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(now()->subMonth())->toBeLastMonth();
});

test('fails', function () {
    expect('2999-01-01')->toBeLastMonth();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2999-01-01 00:00:00] is in the last month');

test('pass negated', function () {
    expect('2999-01-01')->not->toBeLastMonth();
});

test('fails negated', function () {
    expect(now()->subMonth())->not->toBeLastMonth();
})->throws(ExpectationFailedException::class);
