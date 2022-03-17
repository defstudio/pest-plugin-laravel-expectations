<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass if missing data parameter', function () {
    expect(view('page'))->toBeView('page');
});

test('pass with data parameter', function () {
    expect(view('page')->with('data', 'foo'))->toBeView('page', ['data']);
});

test('fails if value cannot be instance of view', function () {
    expect('page')->toBeView('page');
})->throws(ExpectationFailedException::class);

test('negated pass', function () {
    expect('page')->not->toBeView('page');
});

test('negated fail', function () {
    expect(view('page'))->not->toBeView('page');
})->throws(ExpectationFailedException::class);
