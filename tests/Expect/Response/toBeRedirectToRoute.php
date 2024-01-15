<?php

use function Pest\Laravel\get;
use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    $response = get('/redirect-ok-route');

    expect($response)->toBeRedirectToRoute('ok');
});

test('fails', function () {
    $response = get('/ok');

    expect($response)->toBeRedirectToRoute('ok');
})->throws(ExpectationFailedException::class);

test('pass with negation', function () {
    $response = get('/ok');

    expect($response)->not->toBeRedirectToRoute('ok');
});

test('fails with negation', function () {
    $response = get('/redirect-ok-route');

    expect($response)->not->toBeRedirectToRoute('ok');
})->throws(ExpectationFailedException::class, 'Expecting Illuminate\Testing\TestResponse not to be redirect to route \'ok\'');
