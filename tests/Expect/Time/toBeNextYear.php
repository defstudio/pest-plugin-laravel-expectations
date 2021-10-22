<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(now()->addYear())->toBeNextYear();
});

test('fails', function () {
    expect('2999-01-01')->toBeNextYear();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2999-01-01 00:00:00] is in the next year');

test('pass negated', function () {
    expect('2999-01-01')->not->toBeNextYear();
});

test('fails negated', function () {
    expect(now()->addYear())->not->toBeNextYear();
})->throws(ExpectationFailedException::class);
