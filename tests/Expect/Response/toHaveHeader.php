<?php

use function Pest\Laravel\get;
use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(get('/header'))->toHaveHeader('foo', 'bar');
});

test('fail', function () {
    expect(get('/header'))->toHaveHeader('foo', 'baz');
})->throws(ExpectationFailedException::class, 'Failed asserting that two strings are equal.');

test('pass negated', function () {
    expect(get('/header'))->not->toHaveHeader('foo', 'baz');
});

test('fail negated', function () {
    expect(get('/header'))->not->toHaveHeader('foo', 'bar');
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse Object (...) not to have header 'foo' 'bar'.");
