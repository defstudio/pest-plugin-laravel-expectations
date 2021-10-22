<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(now()->addWeek())->toBeNextWeek();
});

test('fails', function () {
    expect('2999-01-01')->toBeNextWeek();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2999-01-01 00:00:00] is in the next week');

test('pass negated', function () {
    expect('2999-01-01')->not->toBeNextWeek();
});

test('fails negated', function () {
    expect(now()->addWeek())->not->toBeNextWeek();
})->throws(ExpectationFailedException::class);
