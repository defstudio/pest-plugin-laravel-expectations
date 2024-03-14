<?php

use PHPUnit\Framework\ExpectationFailedException;

use function Pest\Laravel\get;

test('pass with only values', function () {
    expect(get('/session/all'))->toHaveAllSession([
        'foo',
        'baz',
    ]);
});

test('pass with keys and values', function () {
    expect(get('/session/all'))->toHaveAllSession([
        'foo' => 'bar',
        'baz' => 'biz',
    ]);
});

test('fail with only values', function () {
    expect(get('/session/all'))->toHaveAllSession([
        'not-in-session',
    ]);
})->throws(ExpectationFailedException::class, 'Session is missing expected key [not-in-session].');

test('fail with keys and values', function () {
    expect(get('/session/all'))->toHaveAllSession([
        'foo' => 'not-the-value',
    ]);
})->throws(ExpectationFailedException::class, 'Failed asserting that two strings are equal.');
