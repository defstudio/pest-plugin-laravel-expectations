<?php

use Illuminate\Database\Eloquent\Collection;
use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(Collection::empty())->toBeEloquentCollection();
    expect('1, 2, 3')->not->toBeCollection();
});

test('failure', function () {
    expect(collect(['a', 'b', 'c']))->toBeEloquentCollection();
})->throws(ExpectationFailedException::class);

test('negated pass', function () {
    expect(collect(['a', 'b', 'c']))->not->toBeEloquentCollection();
});

test('negated failure', function () {
    expect(Collection::empty())->not->toBeEloquentCollection();
})->throws(ExpectationFailedException::class);
