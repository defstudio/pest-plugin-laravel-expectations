<?php

use function Pest\Laravel\get;
use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(get('json'))->toHaveExactJson([
        'foo' => [
            'bar' => 'baz',
        ],
        'qux'  => 1,
        'quuz' => [
            'corge',
            'grault',
        ],
    ]);
});

test('fails', function () {
    expect(get('json'))->toHaveExactJson([
        'foo' => [
            'bar' => 'baz',
        ],
        'qux'  => '1',
        'quuz' => [
            'corge',
            'grault',
        ],
    ]);
})->throws(ExpectationFailedException::class, 'Failed asserting that two strings are equal');

test('pass negated', function () {
    expect(get('json'))->not->toHaveExactJson(['foo' => ['bar' => 'baz']]);
});

test('fails negated', function () {
    expect(get('json'))->not->toHaveExactJson([
        'foo' => [
            'bar' => 'baz',
        ],
        'qux'  => 1,
        'quuz' => [
            'corge',
            'grault',
        ],
    ]);
})->throws(ExpectationFailedException::class);
