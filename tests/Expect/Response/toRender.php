<?php

use function Pest\Laravel\get;
use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(get('/page'))->toRender('title');
});

test('pass without escape', function () {
    expect(get('/page'))->toRender('<h1>title</h1>', false);
});

test('pass with two values', function () {
    expect(get('/page'))->toRender(['<h3>section</h3>', '<h1>title</h1>'], false);
});

test('fail', function () {
    expect(get('/page'))->toRender('foo');
})->throws(ExpectationFailedException::class);

test('negated pass', function () {
    expect(get('/page'))->not->toRender('foo');
});

test('negated fail', function () {
    expect(get('/page'))->not->toRender('title');
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse Object (...) not to render 'title'");
