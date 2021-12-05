<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(now()->addDay())->toBeTomorrow();
});

test('fails', function () {
    expect('2999-01-01')->toBeTomorrow();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2999-01-01 00:00:00] is tomorrow');

test('pass negated', function () {
    expect('2999-01-01')->not->toBeTomorrow();
});

test('fails negated', function () {
    expect(now()->addDay())->not->toBeTomorrow();
})->throws(ExpectationFailedException::class);
