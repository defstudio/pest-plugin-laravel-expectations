<?php

use function Pest\Laravel\get;

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(get('json'))->toHaveExactJson([
        'foo'  => [
            'bar' => 'baz',
        ],
        'qux'  => 1,
        'quuz' => [
            'corge',
            'grault',
        ],
        'foobar' => [
            'foobar_foo' => 'foo',
            'foobar_bar' => 'bar',
        ],
        '0'    => ['foo'],
        'bars' => [
            ['bar' => 'foo 0', 'foo' => 'bar 0'],
            ['bar' => 'foo 1', 'foo' => 'bar 1'],
            ['bar' => 'foo 2', 'foo' => 'bar 2'],
        ],
        'baz' => [
            ['foo' => 'bar 0', 'bar' => ['foo' => 'bar 0', 'bar' => 'foo 0']],
            ['foo' => 'bar 1', 'bar' => ['foo' => 'bar 1', 'bar' => 'foo 1']],
        ],
        'barfoo' => [
            ['bar' => ['bar' => 'foo 0']],
            ['bar' => ['bar' => 'foo 0', 'foo' => 'foo 0']],
            ['bar' => ['foo' => 'bar 0', 'bar' => 'foo 0', 'rab' => 'rab 0']],
        ],
        'numeric_keys' => [
            2 => ['bar' => 'foo 0', 'foo' => 'bar 0'],
            3 => ['bar' => 'foo 1', 'foo' => 'bar 1'],
            4 => ['bar' => 'foo 2', 'foo' => 'bar 2'],
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
        'foo'  => [
            'bar' => 'baz',
        ],
        'qux'  => 1,
        'quuz' => [
            'corge',
            'grault',
        ],
        'foobar' => [
            'foobar_foo' => 'foo',
            'foobar_bar' => 'bar',
        ],
        '0'    => ['foo'],
        'bars' => [
            ['bar' => 'foo 0', 'foo' => 'bar 0'],
            ['bar' => 'foo 1', 'foo' => 'bar 1'],
            ['bar' => 'foo 2', 'foo' => 'bar 2'],
        ],
        'baz' => [
            ['foo' => 'bar 0', 'bar' => ['foo' => 'bar 0', 'bar' => 'foo 0']],
            ['foo' => 'bar 1', 'bar' => ['foo' => 'bar 1', 'bar' => 'foo 1']],
        ],
        'barfoo' => [
            ['bar' => ['bar' => 'foo 0']],
            ['bar' => ['bar' => 'foo 0', 'foo' => 'foo 0']],
            ['bar' => ['foo' => 'bar 0', 'bar' => 'foo 0', 'rab' => 'rab 0']],
        ],
        'numeric_keys' => [
            2 => ['bar' => 'foo 0', 'foo' => 'bar 0'],
            3 => ['bar' => 'foo 1', 'foo' => 'bar 1'],
            4 => ['bar' => 'foo 2', 'foo' => 'bar 2'],
        ],
    ]);
})->throws(ExpectationFailedException::class);
