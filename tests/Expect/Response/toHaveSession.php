<?php

use PHPUnit\Framework\ExpectationFailedException;

use function Pest\Laravel\get;

test('pass', function () {
    expect(get('/session'))->toHaveSession('foo', 'bar');
});

test('fail', function () {
    expect(get('/session'))->toHaveSession('foo', 'baz');
})->throws(ExpectationFailedException::class, 'Failed asserting that two strings are equal.');

test('pass negated', function () {
    expect(get('/session'))->not->toHaveSession('foo', 'baz');
});

test('fail negated', function () {
    expect(get('/session'))->not->toHaveSession('foo', 'bar');
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse Object (...) not to have session 'foo' 'bar'.");
