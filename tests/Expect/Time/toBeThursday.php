<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect('2021-10-21')->toBeThursday();
});

test('fails', function () {
    expect('2021-10-22')->toBeThursday();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-10-22 00:00:00] is Thursday');

test('pass negated', function () {
    expect('2021-10-22')->not->toBeThursday();
});

test('fails negated', function () {
    expect('2021-10-21')->not->toBeThursday();
})->throws(ExpectationFailedException::class);
