<?php

use Illuminate\Http\Response;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

uses(TestCase::class)->in('Expect');
uses(TestCase::class)->in('Regression');

/**
 * @param  callable(Response $response)  $setup
 */
function build_response(callable $setup): TestResponse
{
    return TestResponse::fromBaseResponse(tap(new Response, $setup));
}
