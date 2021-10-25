<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect('2021-10-20')->toBeWednesday();
});

test('fails', function () {
    expect('2021-10-21')->toBeWednesday();
})->throws(ExpectationFailedException::class, 'Failed to assert that [2021-10-21 00:00:00] is Wednesday');

test('pass negated', function () {
    expect('2021-10-21')->not->toBeWednesday();
});

test('fails negated', function () {
    expect('2021-10-20')->not->toBeWednesday();
})->throws(ExpectationFailedException::class);
