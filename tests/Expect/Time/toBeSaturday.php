<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect('2021-10-23')->toBeSaturday();
});

test('fails', function () {
    expect('2021-10-24')->toBeSaturday();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-10-24 00:00:00] is Saturday');

test('pass negated', function () {
    expect('2021-10-24')->not->toBeSaturday();
});

test('fails negated', function () {
    expect('2021-10-23')->not->toBeSaturday();
})->throws(ExpectationFailedException::class);
