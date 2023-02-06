<?php

use PHPUnit\Framework\ExpectationFailedException;

use function Pest\Laravel\get;

test('pass', function () {
    $response = get('/no-content');

    expect($response)->toHaveNoContent();
});

test('pass with custom status', function () {
    $response = get('/ok');

    expect($response)->toHaveNoContent(200);
});

test('fails', function () {
    $response = get('/page');

    expect($response)->toHaveNoContent();
})->throws(ExpectationFailedException::class, 'Expected response status code [204] but received 200');

test('fails with a no content yet not custom status', function () {
    $response = get('/no-content');

    expect($response)->toHaveNoContent(205);
})->throws(ExpectationFailedException::class, 'Expected response status code [205] but received 204');

test('pass with negation', function () {
    $response = get('/page');

    expect($response)->not->toHaveNoContent();
});

test('fails with negation', function () {
    $response = get('/status/204');

    expect($response)->not->toHaveNoContent();
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse Object (...) not to have no content");
