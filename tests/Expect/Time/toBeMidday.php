<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect('2021-10-18 12:00:00')->toBeMidday();
});

test('fails', function () {
    expect('2021-10-19')->toBeMidday();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-10-19 00:00:00] is midday');

test('pass negated', function () {
    expect('2021-10-19')->not->toBeMidday();
});

test('fails negated', function () {
    expect('2021-10-18 12:00:00')->not->toBeMidday();
})->throws(ExpectationFailedException::class);
