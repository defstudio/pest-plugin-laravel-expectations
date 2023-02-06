<?php

use PHPUnit\Framework\ExpectationFailedException;
use Symfony\Component\HttpFoundation\Response;

use function Pest\Laravel\get;

test('pass', function () {
    $response = get('/ok');

    expect($response)->toBeSuccessful();
});

test('pass with all success statuses', function ($status) {
    $response = get("/status/$status");

    expect($response)->toBeSuccessful();
})->with([
    Response::HTTP_OK,
    Response::HTTP_CREATED,
    Response::HTTP_ACCEPTED,
    Response::HTTP_NON_AUTHORITATIVE_INFORMATION,
    Response::HTTP_NO_CONTENT,
    Response::HTTP_RESET_CONTENT,
    Response::HTTP_PARTIAL_CONTENT,
    Response::HTTP_MULTI_STATUS,
    Response::HTTP_ALREADY_REPORTED,
    Response::HTTP_IM_USED,
]);

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
