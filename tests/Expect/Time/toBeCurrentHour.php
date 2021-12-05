<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(now())->toBeCurrentHour();
});

test('fails', function () {
    expect(now()->subHour())->toBeCurrentHour();
})->throws(ExpectationFailedException::class);

test('pass negated', function () {
    expect(now()->subHour())->not->toBeCurrentHour();
});

test('fails negated', function () {
    expect(now())->not->toBeCurrentHour();
})->throws(ExpectationFailedException::class);
