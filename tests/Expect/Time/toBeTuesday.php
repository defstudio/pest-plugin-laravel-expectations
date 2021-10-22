<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect('2021-10-19')->toBeTuesday();
});

test('fails', function () {
    expect('2021-10-20')->toBeTuesday();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-10-20 00:00:00] is Tuesday');

test('pass negated', function () {
    expect('2021-10-20')->not->toBeTuesday();
});

test('fails negated', function () {
    expect('2021-10-19')->not->toBeTuesday();
})->throws(ExpectationFailedException::class);
