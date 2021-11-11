<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect('2021-10-18 00:00:00')->toBeMidnight();
});

test('fails', function () {
    expect('2021-10-19 03:00:00')->toBeMidnight();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-10-19 03:00:00] is midnight');

test('pass negated', function () {
    expect('2021-10-19 03:00:00')->not->toBeMidnight();
});

test('fails negated', function () {
    expect('2021-10-18 00:00:00')->not->toBeMidnight();
})->throws(ExpectationFailedException::class);
