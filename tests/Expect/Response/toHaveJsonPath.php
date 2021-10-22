<?php

use function Pest\Laravel\get;
use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(get('json'))->toHaveJsonPath('foo.bar', 'baz');
});

test('fails with wrong expect value', function () {
    expect(get('json'))->toHaveJsonPath('foo.bar', 'quuz');
})->throws(ExpectationFailedException::class, 'Failed asserting that two strings are identical');

test('fails with wrong path', function () {
    expect(get('json'))->toHaveJsonPath('foo.baz', 'quuz');
})->throws(ExpectationFailedException::class, "Failed asserting that null is identical to 'quuz'");

test('pass negated', function () {
    expect(get('json'))->not->toHaveJsonPath('foo.bar', 'quuz');
});

test('fails negated', function () {
    expect(get('json'))->not->toHaveJsonPath('foo.bar', 'baz');
})->throws(ExpectationFailedException::class);
