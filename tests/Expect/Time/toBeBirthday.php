<?php

use Carbon\Carbon;
use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect('2014-04-27')->toBeBirthday('1987-04-27');
});

test('pass against today', function () {
    Carbon::setTestNow('1987-04-27');
    expect('2014-04-27')->toBeBirthday();
});

test('fails', function () {
    expect('2014-04-25')->toBeBirthday('1987-04-27');
})->throws(ExpectationFailedException::class, 'Failed to assert that [2014-04-25 00:00:00] is a birthday');

test('pass negated', function () {
    expect('2014-04-25')->not->toBeBirthday('1987-04-27');
});

test('fails negated', function () {
    expect('2014-04-27')->not->toBeBirthday('1987-04-27');
})->throws(ExpectationFailedException::class);
