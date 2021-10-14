<?php

use function Pest\Laravel\get;
use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(get('/page'))
        ->toRenderText('content with bold text')
        ->toContainText('content with bold text');
});

test('pass with two values', function () {
    expect(get('/page'))
        ->toRenderText(['section', 'title'])
        ->toContainText(['section', 'title']);
});

test('fail', function () {
    expect(get('/page'))->toRenderText('foo');
})->throws(ExpectationFailedException::class);

test('negated pass', function () {
    expect(get('/page'))
        ->not->toRenderText('foo')
        ->not->toContainText('foo');
});

test('negated fail', function () {
    expect(get('/page'))->not->toRenderText('title');
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse Object (...) not to render text 'title'");
