<?php

use PHPUnit\Framework\ExpectationFailedException;

use function Pest\Laravel\get;

test('pass', function () {
    $response = get('/ok');

    expect($response)->toBeOk();
});

test('pass with simple response', function () {
    $response = response()->noContent(200);

    expect($response)->toBeOk();
});

test('fails', function () {
    $response = get('/redirect');

    expect($response)->toBeOk();
})->throws(ExpectationFailedException::class, 'Expected response status code [200] but received 302');

test('fails with a successful yet not 200 status', function () {
    $response = get('/status/203');

    expect($response)->toBeOk();
})->throws(ExpectationFailedException::class, 'Expected response status code [200] but received 203');

test('pass with negation', function () {
    $response = get('/redirect');

    expect($response)->not->toBeOk();
});

test('fails with negation', function () {
    $response = get('/ok');

    expect($response)->not->toBeOk();
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse Object (...) not to be ok");
