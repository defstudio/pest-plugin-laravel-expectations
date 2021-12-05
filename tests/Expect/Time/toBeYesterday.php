<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(now()->subDay())->toBeYesterday();
});

test('fails', function () {
    expect('2999-01-01')->toBeYesterday();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2999-01-01 00:00:00] is yesterday');

test('pass negated', function () {
    expect('2999-01-01')->not->toBeYesterday();
});

test('fails negated', function () {
    expect(now()->subDay())->not->toBeYesterday();
})->throws(ExpectationFailedException::class);
