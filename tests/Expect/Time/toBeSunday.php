<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect('2021-10-24')->toBeSunday();
});

test('fails', function () {
    expect('2021-10-25')->toBeSunday();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-10-25 00:00:00] is Sunday');

test('pass negated', function () {
    expect('2021-10-25')->not->toBeSunday();
});

test('fails negated', function () {
    expect('2021-10-24')->not->toBeSunday();
})->throws(ExpectationFailedException::class);
