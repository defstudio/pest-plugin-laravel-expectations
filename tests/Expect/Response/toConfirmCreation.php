<?php

use function Pest\Laravel\get;

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    $response = get('/status/201');

    expect($response)->toConfirmCreation();
});

test('fails', function () {
    $response = get('/redirect');

    expect($response)->toConfirmCreation();
})->throws(ExpectationFailedException::class, 'Expected response status code [201] but received 302');

test('pass with negation', function () {
    $response = get('/redirect');

    expect($response)->not->toConfirmCreation();
});

test('fails with negation', function () {
    $response = get('/status/201');

    expect($response)->not->toConfirmCreation();
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse Object (...) not to confirm creation");
