<?php

use PHPUnit\Framework\ExpectationFailedException;

use function Pest\Laravel\get;

test('pass', function () {
    expect(get('json'))->toHaveJsonFragment(['bar' => 'baz']);
});

test('fails', function () {
    expect(get('json'))->toHaveJsonFragment(['bar' => 'foo']);
})->throws(ExpectationFailedException::class, 'Unable to find JSON');

test('pass negated', function () {
    expect(get('json'))->not->toHaveJsonFragment(['bar' => 'foo']);
});

test('fails negated', function () {
    expect(get('json'))->not->toHaveJsonFragment(['bar' => 'baz']);
})->throws(ExpectationFailedException::class);
