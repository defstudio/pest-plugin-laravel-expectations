<?php

use Illuminate\Validation\ValidationException;
use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(fn () => throw ValidationException::withMessages([
        'foo.bar' => ['baz', 'qux'],
        'zip' => ['zap'],
    ]))->toThrowValidationException([
        'foo.bar' => ['baz', 'qux'],
        'zip' => ['zap'],
    ]);
});

test('fail', function () {
    expect(fn () => '')->toThrowValidationException([
        'foo.bar' => ['baz', 'qux'],
        'zip' => ['zap'],
    ]);
})->throws(ExpectationFailedException::class, 'Exception "Illuminate\Validation\ValidationException" not thrown.');

test('negated pass', function () {
    expect(fn () => '')->not->toThrowValidationException([
        'foo.bar' => ['baz', 'qux'],
        'zip' => ['zap'],
    ]);
});

test('negated fail', function () {
    expect(fn () => throw ValidationException::withMessages([
        'foo.bar' => ['baz', 'qux'],
        'zip' => ['zap'],
    ]))->not->toThrowValidationException([
        'foo.bar' => ['baz', 'qux'],
        'zip' => ['zap'],
    ]);
})->throws(ExpectationFailedException::class, 'Expecting Closure not to throw validation exception […].');
