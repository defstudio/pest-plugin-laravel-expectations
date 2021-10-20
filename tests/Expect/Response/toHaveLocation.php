<?php

use Illuminate\Http\Response;
use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    $response = build_response(function (Response $response) {
        $response->header('Location', '/foo');
    });

    expect($response)->toHaveLocation('/foo');
});

test('fails', function () {
    $response = build_response(function (Response $response) {
        $response->header('Location', '/foo');
    });

    expect($response)->toHaveLocation('/bar');
})->throws(ExpectationFailedException::class, 'Failed asserting that two strings are equal');

test('pass with negation', function () {
    $response = build_response(function (Response $response) {
        $response->header('Location', '/foo');
    });

    expect($response)->not->toHaveLocation('/bar');
});

test('fails with negation', function () {
    $response = build_response(function (Response $response) {
        $response->header('Location', '/foo');
    });

    expect($response)->not->toHaveLocation('/foo');
})->throws(ExpectationFailedException::class);
