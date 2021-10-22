<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(now())->toBeCurrentMonth();
});

test('fails', function () {
    expect('2999-01-01')->toBeCurrentMonth();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2999-01-01 00:00:00] is in the current month');

test('pass negated', function () {
    expect('2999-01-01')->not->toBeCurrentMonth();
});

test('fails negated', function () {
    expect(now())->not->toBeCurrentMonth();
})->throws(ExpectationFailedException::class);
