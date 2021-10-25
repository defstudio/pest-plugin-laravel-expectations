<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(now())->toBeCurrentWeek();
});

test('fails', function () {
    expect('2999-01-01')->toBeCurrentWeek();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2999-01-01 00:00:00] is in the current week');

test('pass negated', function () {
    expect('2999-01-01')->not->toBeCurrentWeek();
});

test('fails negated', function () {
    expect(now())->not->toBeCurrentWeek();
})->throws(ExpectationFailedException::class);
