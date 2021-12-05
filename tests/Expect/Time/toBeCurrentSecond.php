<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(now())->toBeCurrentSecond();
});

test('fails', function () {
    expect(now()->subSecond())->toBeCurrentSecond();
})->throws(ExpectationFailedException::class);

test('pass negated', function () {
    expect(now()->subSecond())->not->toBeCurrentSecond();
});

test('fails negated', function () {
    expect(now())->not->toBeCurrentSecond();
})->throws(ExpectationFailedException::class);
