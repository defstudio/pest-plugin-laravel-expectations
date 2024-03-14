<?php

use PHPUnit\Framework\ExpectationFailedException;

use function Pest\Laravel\get;

test('pass', function ($structure) {
    expect(get('json'))->toHaveJsonStructure($structure);
})->with([
    'without structure' => null,
    'at root' => ['structure' => ['foo']],
    'nested' => ['structure' => ['foobar' => ['foobar_foo', 'foobar_bar']]],
    'wildcard (repeating structure)' => ['structure' => ['bars' => ['*' => ['bar', 'foo']]]],
    'wildcard (numeric keys)' => ['structure' => ['numeric_keys' => ['*' => ['bar', 'foo']]]],
    'nested after wildcard' => ['structure' => ['baz' => ['*' => ['foo', 'bar' => ['foo', 'bar']]]]],
]);

test('fails', function () {
    expect(get('json'))->toHaveJsonStructure(['foo' => ['bee']]);
})->throws(ExpectationFailedException::class, "Failed asserting that an array has the key 'bee'");

test('pass negated', function () {
    expect(get('json'))->not->toHaveJsonStructure(['foo' => ['bee']]);
});

test('fails negated', function () {
    expect(get('json'))->not->toHaveJsonStructure(['foo']);
})->throws(ExpectationFailedException::class);
