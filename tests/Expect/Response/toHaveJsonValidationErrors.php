<?php

use Illuminate\Http\Response;
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    $response = build_response(function (Response $response) {
        $response->setContent(json_encode([
            'status' => 'ok',
            'errors' => ['foo' => 'oops'],
        ]));
    });

    expect($response)->toHaveJsonValidationErrors('foo');
});

test('pass with validation error message', function () {
    $response = build_response(function (Response $response) {
        $response->setContent(json_encode([
            'status' => 'ok',
            'errors' => ['foo' => 'oops'],
        ]));
    });

    expect($response)->toHaveJsonValidationErrors(['foo' => 'oops']);
});

test('pass with validation partial error message', function () {
    $response = build_response(function (Response $response) {
        $response->setContent(json_encode([
            'status' => 'ok',
            'errors' => ['foo' => 'oops! oh no!'],
        ]));
    });

    expect($response)->toHaveJsonValidationErrors(['foo' => 'oops']);
});

test('pass with array', function () {
    $response = build_response(function (Response $response) {
        $response->setContent(json_encode([
            'status' => 'ok',
            'errors' => ['foo' => 'one', 'bar' => 'two'],
        ]));
    });

    expect($response)->toHaveJsonValidationErrors(['foo', 'bar']);
});

test('pass with custom errors key', function () {
    $response = build_response(function (Response $response) {
        $response->setContent(json_encode([
            'status' => 'ok',
            'data'   => ['foo' => 'oops'],
        ]));
    });

    expect($response)->toHaveJsonValidationErrors('foo', 'data');
});

test('fails', function () {
    $response = build_response(function (Response $response) {
        $response->setContent(json_encode([
            'status' => 'ok',
            'errors' => ['foo' => 'oops'],
        ]));
    });

    expect($response)->toHaveJsonValidationErrors('bar');
})->throws(ExpectationFailedException::class, "Failed to find a validation error in the response for key: 'bar'");

test('fails with wrong message', function () {
    $response = build_response(function (Response $response) {
        $response->setContent(json_encode([
            'status' => 'ok',
            'errors' => ['foo' => 'oops'],
        ]));
    });

    expect($response)->toHaveJsonValidationErrors(['foo' => 'damn']);
})->throws(AssertionFailedError::class, "Failed to find a validation error in the response for key and message: 'foo' => 'damn'");

test('fails without errors', function () {
    $response = build_response(function (Response $response) {
        $response->setContent(json_encode([
            'status' => 'ok',
        ]));
    });

    expect($response)->toHaveJsonValidationErrors('bar');
})->throws(ExpectationFailedException::class, "Failed to find a validation error in the response for key: 'bar'");

test('pass negated', function () {
    $response = build_response(function (Response $response) {
        $response->setContent(json_encode([
            'status' => 'ok',
            'errors' => ['foo' => 'oops'],
        ]));
    });

    expect($response)->not->toHaveJsonValidationErrors('bar');
});

test('fails negated', function () {
    $response = build_response(function (Response $response) {
        $response->setContent(json_encode([
            'status' => 'ok',
            'errors' => ['foo' => 'oops'],
        ]));
    });

    expect($response)->not->toHaveJsonValidationErrors('foo');
})->throws(ExpectationFailedException::class);
