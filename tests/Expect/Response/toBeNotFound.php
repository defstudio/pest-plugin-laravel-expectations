<?php

use PHPUnit\Framework\ExpectationFailedException;

use function Pest\Laravel\get;

test('pass', function () {
    $response = get('/unknown');

    expect($response)->toBeNotFound();
});

test('fails', function () {
    $response = get('/redirect');

    expect($response)->toBeNotFound();
})->throws(ExpectationFailedException::class, 'Expected response status code [404] but received 302');

test('pass with negation', function () {
    $response = get('/redirect');

    expect($response)->not->toBeNotFound();
});

test('fails with negation', function () {
    $response = get('/unknown');

    expect($response)->not->toBeNotFound();
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse Object (...) not to be not found");
