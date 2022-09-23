<?php

use function Pest\Laravel\get;

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(get('/page'))->toRenderInOrder([
        '<h1>title</h1>', '<h3>section</h3>',
        "<p>\n    content\n</p>",
    ]);
});

test('fail', function () {
    expect(get('/page'))->toRenderInOrder(['title', 'content', 'section']);
})->throws(ExpectationFailedException::class);

test('negated pass', function () {
    expect(get('/page'))->not->toRenderInOrder(['title', 'content', 'section']);
});

test('negated fail', function () {
    expect(get('/page'))->not->toRenderInOrder(['title', 'section', 'content']);
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse Object (...) not to render in order Array (...)");
