<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect('2021-10-18')->toBeMonday();
});

test('fails', function () {
    expect('2021-10-19')->toBeMonday();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-10-19 00:00:00] is Monday');

test('pass negated', function () {
    expect('2021-10-19')->not->toBeMonday();
});

test('fails negated', function () {
    expect('2021-10-18')->not->toBeMonday();
})->throws(ExpectationFailedException::class);
