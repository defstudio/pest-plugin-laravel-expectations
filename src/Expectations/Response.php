<?php

declare(strict_types=1);

use Illuminate\Testing\TestResponse;
use Pest\Expectation;

expect()->extend(
    'toBeRedirect',

    function (string $uri = null): Expectation {
        /** @var TestResponse $response */
        $response = $this->value;

        $response->assertRedirect($uri);

        return $this;
    }
);
