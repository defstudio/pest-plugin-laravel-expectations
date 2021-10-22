<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(now()->addHour())->toBeFuture();
});

test('fails', function () {
    expect('1950-01-01')->toBeFuture();
})->throws(ExpectationFailedException::class, 'Failed to assert that [1950-01-01 00:00:00] is in the future');

test('pass negated', function () {
    expect(now())->not->toBeFuture();
});

test('fails negated', function () {
    expect(now()->addHour())->not->toBeFuture();
})->throws(ExpectationFailedException::class);
