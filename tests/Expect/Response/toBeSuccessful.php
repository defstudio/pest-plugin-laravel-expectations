<?php

use function Pest\Laravel\get;
use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    $response = get('/ok');

    expect($response)->toBeSuccessful();
});

test('fails', function () {
    $response = get('/redirect');

    expect($response)->toBeSuccessful();
})->throws(ExpectationFailedException::class, 'Expected response status code [>=200, <300] but received 302');

test('pass with negation', function () {
    $response = get('/redirect');

    expect($response)->not->toBeSuccessful();
});

test('fails with negation', function () {
    $response = get('/ok');

    expect($response)->not->toBeSuccessful();
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse Object (...) not to be successful");
