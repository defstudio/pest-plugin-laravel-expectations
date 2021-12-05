<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(now()->addMonth())->toBeNextMonth();
});

test('fails', function () {
    expect(now())->toBeNextMonth();
})->throws(ExpectationFailedException::class);

test('pass negated', function () {
    expect(now())->not->toBeNextMonth();
});

test('fails negated', function () {
    expect(now()->addMonth())->not->toBeNextMonth();
})->throws(ExpectationFailedException::class);
