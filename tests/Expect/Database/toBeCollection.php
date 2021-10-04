<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(collect([1, 2, 3]))->toBeCollection();
    expect('1, 2, 3')->not->toBeCollection();
});

test('failure', function () {
    expect((object) [])->toBeCollection();
})->throws(ExpectationFailedException::class);

test('negated pass', function () {
    expect((object) [])->not->toBeCollection();
});

test('negated failure', function () {
    expect(collect(['a', 'b', 'c']))->not->toBeCollection();
})->throws(ExpectationFailedException::class);
