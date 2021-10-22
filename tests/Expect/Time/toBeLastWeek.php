<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(now()->subWeek())->toBeLastWeek();
});

test('fails', function () {
    expect('2999-01-01')->toBeLastWeek();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2999-01-01 00:00:00] is in the last week');

test('pass negated', function () {
    expect('2999-01-01')->not->toBeLastWeek();
});

test('fails negated', function () {
    expect(now()->subWeek())->not->toBeLastWeek();
})->throws(ExpectationFailedException::class);
