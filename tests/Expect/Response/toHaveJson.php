<?php

use function Pest\Laravel\get;

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(get('json'))->toHaveJson(['foo' => ['bar' => 'baz']]);
});

test('pass strict', function () {
    expect(get('json'))->toHaveJson(['qux'  => 1], true);
});

test('fails', function () {
    expect(get('json'))->toHaveJson(['foo' => ['bar' => 'foo']]);
})->throws(ExpectationFailedException::class, 'Unable to find JSON');

test('fails strict', function () {
    expect(get('json'))->toHaveJson(['qux'  => '1'], true);
})->throws(ExpectationFailedException::class, 'Unable to find JSON');

test('pass negated', function () {
    expect(get('json'))->not->toHaveJson(['foo' => ['bar' => 'foo']]);
});

test('fails negated', function () {
    expect(get('json'))->not->toHaveJson(['foo' => ['bar' => 'baz']]);
})->throws(ExpectationFailedException::class);
