<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(now()->subYear())->toBeLastYear();
});

test('fails', function () {
    expect('2999-01-01')->toBeLastYear();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2999-01-01 00:00:00] is in the last year');

test('pass negated', function () {
    expect('2999-01-01')->not->toBeLastYear();
});

test('fails negated', function () {
    expect(now()->subYear())->not->toBeLastYear();
})->throws(ExpectationFailedException::class);
