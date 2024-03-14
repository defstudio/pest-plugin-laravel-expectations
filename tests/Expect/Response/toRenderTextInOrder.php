<?php

use PHPUnit\Framework\ExpectationFailedException;

use function Pest\Laravel\get;

test('pass', function () {
    expect(get('/page'))
        ->toRenderTextInOrder(['title', 'section', 'content'])
        ->toContainTextInOrder(['title', 'section', 'content']);
});

test('fail', function () {
    expect(get('/page'))->toRenderTextInOrder(['title', 'content', 'section']);
})->throws(ExpectationFailedException::class);

test('negated pass', function () {
    expect(get('/page'))
        ->not->toRenderTextInOrder(['title', 'content', 'section'])
        ->not->toContainTextInOrder(['title', 'content', 'section']);
});

test('negated fail', function () {
    expect(get('/page'))->not->toRenderTextInOrder(['title', 'section', 'content']);
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse not to render text in order […]");
