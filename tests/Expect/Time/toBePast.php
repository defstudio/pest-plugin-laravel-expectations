<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(now()->subHour())->toBePast();
});

test('fails', function () {
    expect('2999-01-01')->toBePast();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2999-01-01 00:00:00] is in the past');

test('pass negated', function () {
    expect(now()->addHour())->not->toBePast();
});

test('fails negated', function () {
    expect(now()->subHour())->not->toBePast();
})->throws(ExpectationFailedException::class);
