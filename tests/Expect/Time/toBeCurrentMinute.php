<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(now())->toBeCurrentMinute();
});

test('fails', function () {
    expect(now()->subMinute())->toBeCurrentMinute();
})->throws(ExpectationFailedException::class);

test('pass negated', function () {
    expect(now()->subMinute())->not->toBeCurrentMinute();
});

test('fails negated', function () {
    expect(now())->not->toBeCurrentMinute();
})->throws(ExpectationFailedException::class);
