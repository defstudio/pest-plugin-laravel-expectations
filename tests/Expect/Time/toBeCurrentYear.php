<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(now())->toBeCurrentYear();
});

test('fails', function () {
    expect('2999-01-01')->toBeCurrentYear();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2999-01-01 00:00:00] is in the current year');

test('pass negated', function () {
    expect('2999-01-01')->not->toBeCurrentYear();
});

test('fails negated', function () {
    expect(now())->not->toBeCurrentYear();
})->throws(ExpectationFailedException::class);
