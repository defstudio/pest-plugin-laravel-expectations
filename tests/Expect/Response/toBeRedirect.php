<?php

use function Pest\Laravel\get;

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    $response = get('/redirect');

    expect($response)->toBeRedirect();
});

test('pass with uri check', function () {
    $response = get('/redirect');

    expect($response)->toBeRedirect('/ok');
});

test('fails', function () {
    $response = get('/ok');

    expect($response)->toBeRedirect();
})->throws(ExpectationFailedException::class);

test('fails with uri check', function () {
    $response = get('/redirect/out');

    expect($response)->toBeRedirect('/ok');
})->throws(ExpectationFailedException::class, 'Failed asserting that the redirect uri [https://www.google.it] matches [/ok]');

test('pass with negation', function () {
    $response = get('/ok');

    expect($response)->not->toBeRedirect();
});

test('fails with negation', function () {
    $response = get('/redirect');

    expect($response)->not->toBeRedirect();
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse Object (...) not to be redirect");
