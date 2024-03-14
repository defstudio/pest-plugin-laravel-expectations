<?php

use PHPUnit\Framework\ExpectationFailedException;
use Symfony\Component\HttpFoundation\Response;

use function Pest\Laravel\get;

test('pass', function ($status) {
    expect(get("/status/$status"))->toHaveStatus($status);
})->with([
    Response::HTTP_CREATED,
    Response::HTTP_ACCEPTED,
    Response::HTTP_BAD_REQUEST,
    Response::HTTP_FORBIDDEN,
    Response::HTTP_NO_CONTENT,
    Response::HTTP_I_AM_A_TEAPOT,
    Response::HTTP_NOT_FOUND,
    Response::HTTP_SERVICE_UNAVAILABLE,
]);

test('fail', function () {
    expect(get('/status/404'))->toHaveStatus(200);
})->throws(ExpectationFailedException::class, 'Expected response status code [200] but received 404');

test('pass negated', function () {
    expect(get('/status/404'))->not->toHaveStatus(200);
});

test('fail negated', function () {
    expect(get('/status/200'))->not->toHaveStatus(200);
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse not to have status 200");
