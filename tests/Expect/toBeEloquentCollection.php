<?php

use Illuminate\Database\Eloquent\Collection;
use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(Collection::empty())->toBeEloquentCollection();
    expect('1, 2, 3')->not->toBeCollection();
});

test('failures', function () {
    expect(collect(['a', 'b', 'c']))->toBeEloquentCollection();
})->throws(ExpectationFailedException::class);

test('not failures', function () {
    expect(Collection::empty())->not->toBeEloquentCollection();
})->throws(ExpectationFailedException::class);
