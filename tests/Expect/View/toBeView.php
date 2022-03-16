<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(view('page'))->toBeView('page');
});

test('fail', function () {
    expect('page')->toBeView('page');
})->throws(ExpectationFailedException::class);

test('negated pass', function () {
    expect('page')->not->toBeView('page');
});
