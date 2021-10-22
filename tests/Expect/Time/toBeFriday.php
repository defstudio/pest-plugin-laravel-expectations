<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect('2021-10-22')->toBeFriday();
});

test('fails', function () {
    expect('2021-10-23')->toBeFriday();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-10-23 00:00:00] is Friday');

test('pass negated', function () {
    expect('2021-10-23')->not->toBeFriday();
});

test('fails negated', function () {
    expect('2021-10-22')->not->toBeFriday();
})->throws(ExpectationFailedException::class);
