<?php

use Illuminate\Http\Response;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

uses(TestCase::class)->in('Expect');

function build_response(closure $setup): TestResponse
{
    return TestResponse::fromBaseResponse(tap(new Response(), $setup));
}
