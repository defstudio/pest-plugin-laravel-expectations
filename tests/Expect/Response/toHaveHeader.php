<?php

use function Pest\Laravel\get;

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(get('/header'))->toHaveHeader('foo', 'bar');
});

test('fail', function () {
    expect(get('/header'))->toHaveHeader('foo', 'baz');
})->throws(ExpectationFailedException::class, 'Header [foo] was found, but value [bar] does not match [baz]');
test('fail without header', function () {
    expect(get('/ok'))->toHaveHeader('foo');
})->throws(ExpectationFailedException::class, 'Header [foo] not present on response');
test('pass negated', function () {
    expect(get('/header'))->not->toHaveHeader('foo', 'baz');
});

test('fail negated', function () {
    expect(get('/header'))->not->toHaveHeader('foo', 'bar');
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse Object (...) not to have header 'foo' 'bar'.");
