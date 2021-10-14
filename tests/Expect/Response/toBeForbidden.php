<?php

use function Pest\Laravel\get;
use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    $response = get('/secret');

    expect($response)->toBeForbidden();
});

test('fails', function () {
    $response = get('/ok');

    expect($response)->toBeForbidden();
})->throws(ExpectationFailedException::class, 'Expected response status code [403] but received 200');

test('pass with negation', function () {
    $response = get('/ok');

    expect($response)->not->toBeForbidden();
});

test('fails with negation', function () {
    $response = get('/secret');

    expect($response)->not->toBeForbidden();
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse Object (...) not to be forbidden");
