<?php

use function Pest\Laravel\get;
use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(get('/page'))->toRender('<h1>title</h1>');
});

test('pass with two values', function () {
    expect(get('/page'))->toRender(['<h3>section</h3>', '<h1>title</h1>']);
});

test('fail', function () {
    expect(get('/page'))->toRender('<h1>foo</h1>');
})->throws(ExpectationFailedException::class);

test('negated pass', function () {
    expect(get('/page'))->not->toRender('<h1>foo</h1>');
});

test('negated fail', function () {
    expect(get('/page'))->not->toRender('<h1>title</h1>');
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse Object (…) not to render '<h1>title</h1>'");
