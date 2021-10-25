<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(now())->toBeCurrentDay();
});

test('fails', function () {
    expect('2999-01-01')->toBeCurrentDay();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2999-01-01 00:00:00] is today');

test('pass negated', function () {
    expect('2999-01-01')->not->toBeCurrentDay();
});

test('fails negated', function () {
    expect(now())->not->toBeCurrentDay();
})->throws(ExpectationFailedException::class);
