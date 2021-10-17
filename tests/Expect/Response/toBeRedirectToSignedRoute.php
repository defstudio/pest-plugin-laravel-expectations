<?php

use function Pest\Laravel\get;
use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    $response = get('/redirect-signed');

    expect($response)->toBeRedirectToSignedRoute('status', 200);
});

test('fails', function () {
    $response = get('/ok');

    expect($response)->toBeRedirectToSignedRoute('status', 200);
})->throws(ExpectationFailedException::class, 'Response status code [200] is not a redirect status code');

test('fails parameter checking', function () {
    $response = get('/redirect-signed');

    expect($response)->toBeRedirectToSignedRoute('status', 201);
})->throws(ExpectationFailedException::class, 'Failed asserting that two strings are equal.');

test('pass with negation', function () {
    $response = get('/ok');

    expect($response)->not->toBeRedirectToSignedRoute('status', 200);
});

test('pass with negation and wrong parameters', function () {
    $response = get('/redirect-signed');

    expect($response)->not->toBeRedirectToSignedRoute('status', 201);
});

test('fails with negation', function () {
    $response = get('/redirect-signed');

    expect($response)->not->toBeRedirectToSignedRoute('status', 200);
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse Object (...) not to be redirect");
