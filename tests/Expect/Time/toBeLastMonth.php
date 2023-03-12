<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(now()->subMonth())->toBeLastMonth();
});

test('fails', function () {
    expect(today()->subMonths(2))->toBeLastMonth();
})->throws(ExpectationFailedException::class, 'Failed to assert that ['.today()->subMonths(2)->format('Y-m-d H:i:s').'] is in the last month');

test('pass negated', function () {
    expect(today()->subMonths(2))->not->toBeLastMonth();
});

test('fails negated', function () {
    expect(now()->subMonth())->not->toBeLastMonth();
})->throws(ExpectationFailedException::class);
