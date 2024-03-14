<?php

use PHPUnit\Framework\ExpectationFailedException;

use function Pest\Laravel\get;

test('pass', function () {
    $response1 = get('/staff-only');

    expect($response1)->toBeUnauthorized();

    $response2 = get('/staff-only?pin=1337');

    expect($response2)->toBeSuccessful()->not->toBeUnauthorized();
});

test('fails', function () {
    $response = get('/ok');

    expect($response)->toBeUnauthorized();
})->throws(ExpectationFailedException::class, 'Expected response status code [401] but received 200');

test('pass with negation', function () {
    $response = get('/ok');

    expect($response)->not->toBeUnauthorized();
});

test('fails with negation', function () {
    $response = get('/staff-only');

    expect($response)->not->toBeUnauthorized();
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse not to be unauthorized");
