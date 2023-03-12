<?php

use function Pest\Laravel\get;
use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(get('/header'))->toHaveMissingHeader('baz');
});

test('fail', function () {
    expect(get('/header'))->toHaveMissingHeader('foo');
})->throws(ExpectationFailedException::class, 'Unexpected header [foo] is present on response');

test('pass negated', function () {
    expect(get('/header'))->not->toHaveMissingHeader('foo');
});

test('fail negated', function () {
    expect(get('/header'))->not->toHaveMissingHeader('baz');
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse Object (…) not to have missing header 'baz'");
