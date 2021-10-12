<?php

declare(strict_types=1);

use Illuminate\Testing\TestResponse;
use Pest\Expectation;
use PHPUnit\Framework\ExpectationFailedException;

expect()->extend(
    'toBeRedirect',
    /**
     * Assert that the given response is a redirection.
     */
    function (string $uri = null): Expectation {
        /** @var TestResponse $response */
        $response = $this->value;

        $response->assertRedirect();

        if ($uri === null) {
            return $this;
        }

        try {
            $response->assertLocation($uri);
        } catch (ExpectationFailedException $exception) {
            throw new ExpectationFailedException("Failed asserting that the redirect uri [{$response->headers->get('Location')}] matches [$uri]");
        }

        return $this;
    }
);

expect()->extend(
    'toBeSuccessful',
    /**
     * Assert that the response has a successful status code.
     */
    function (): Expectation {
        /** @var TestResponse $response */
        $response = $this->value;
        $response->assertSuccessful();

        return $this;
    }
);
