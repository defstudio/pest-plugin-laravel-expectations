<?php

/** @noinspection PhpDocSignatureIsNotCompleteInspection */
/** @noinspection PhpInternalEntityUsedInspection */

declare(strict_types=1);

namespace DefStudio\PestLaravelExpectations\Expectations;

use Illuminate\Http\Response;
use Illuminate\Testing\TestResponse;
use Pest\Expectation;
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\ExpectationFailedException;

function getTestableResponse(Expectation $expectation): TestResponse
{
    /** @var TestResponse|Response $response */
    $response = $expectation->value;

    if ($response instanceof TestResponse) {
        return $response;
    }

    return TestResponse::fromBaseResponse($response);
}

expect()->extend(
    'toBeRedirect',
    /**
     * Assert that the response is a redirection.
     */
    function (string $uri = null): Expectation {
        $response = getTestableResponse($this);

        $response->assertRedirect();

        if ($uri === null) {
            return $this;
        }

        try {
            $response->assertLocation($uri);
        } catch (ExpectationFailedException) {
            throw new ExpectationFailedException("Failed asserting that the redirect uri [{$response->headers->get('Location')}] matches [$uri]");
        }

        return $this;
    }
);

expect()->extend(
    'toBeRedirectToSignedRoute',
    /**
     * Assert whether the response is redirecting to a given signed route.
     */
    function (string $name = null, mixed $parameters = []): Expectation {
        $response = getTestableResponse($this);

        $response->assertRedirectToSignedRoute($name, $parameters);

        return $this;
    }
);

expect()->extend(
    'toBeSuccessful',
    /**
     * Assert that the response has a successful status code.
     */
    function (): Expectation {
        $response = getTestableResponse($this);

        $response->assertSuccessful();

        return $this;
    }
);

expect()->extend(
    'toBeOk',
    /**
     * Assert that the response has a 200 status code.
     */
    function (): Expectation {
        $response = getTestableResponse($this);

        $response->assertOk();

        return $this;
    }
);

expect()->extend(
    'toConfirmCreation',
    /**
     * Assert that the response has a 201 status code.
     */
    function (): Expectation {
        $response = getTestableResponse($this);

        $response->assertCreated();

        return $this;
    }
);

expect()->extend(
    'toBeNotFound',
    /**
     * Assert that the response has a not found status code.
     */
    function (): Expectation {
        $response = getTestableResponse($this);

        $response->assertNotFound();

        return $this;
    }
);

expect()->extend(
    'toBeUnauthorized',
    /**
     * Assert that the response has an unauthorized status code.
     */
    function (): Expectation {
        $response = getTestableResponse($this);

        $response->assertUnauthorized();

        return $this;
    }
);

expect()->extend(
    'toHaveNoContent',
    /**
     * Assert that the response has the given status code and no content.
     */
    function (int $status = 204): Expectation {
        $response = getTestableResponse($this);

        $response->assertNoContent($status);

        return $this;
    }
);

expect()->extend(
    'toBeForbidden',
    /**
     * Assert that the response has a forbidden status code.
     */
    function (): Expectation {
        $response = getTestableResponse($this);

        $response->assertForbidden();

        return $this;
    }
);

expect()->extend(
    'toHaveStatus',
    /**
     * Assert that the response has the given status code.
     */
    function (int $status): Expectation {
        $response = getTestableResponse($this);

        $response->assertStatus($status);

        return $this;
    }
);

expect()->extend(
    'toBeDownload',
    /**
     * Assert that the response offers a file download.
     */
    function (string $filename = null): Expectation {
        $response = getTestableResponse($this);

        try {
            $response->assertDownload($filename);
        } catch (AssertionFailedError $exception) {
            throw new ExpectationFailedException($exception->getMessage());
        }

        return $this;
    }
);

// TODO: alias with ->toContain() when the pipe PR gets merged
expect()->extend(
    'toRender',
    /**
     * Assert that the response contains the given string or array of strings.
     */
    function (string|array $string, bool $escape = false): Expectation {
        $response = getTestableResponse($this);

        $response->assertSee($string, $escape);

        return $this;
    }
);

// TODO: alias with ->toContainInOrder() when the pipe PR gets merged
expect()->extend(
    'toRenderInOrder',
    /**
     * Assert that the response contains the given ordered sequence of strings.
     */
    function (array $strings, bool $escape = false): Expectation {
        $response = getTestableResponse($this);

        $response->assertSeeInOrder($strings, $escape);

        return $this;
    }
);

expect()->extend(
    'toRenderText',
    /**
     * Assert that the response contains the given string or array of strings in its text.
     */
    function (string|array $text, bool $escape = false): Expectation {
        $response = getTestableResponse($this);

        $response->assertSeeText($text, $escape);

        return $this;
    }
);

expect()->extend(
    'toRenderTextInOrder',
    /**
     * Assert that the response contains the given ordered sequence of strings in its text.
     */
    function (array $texts, bool $escape = false): Expectation {
        $response = getTestableResponse($this);

        $response->assertSeeTextInOrder($texts, $escape);

        return $this;
    }
);

expect()->extend(
    'toContainText',
    /**
     * Assert that the response contains the fiven string or array of strings in its text.
     *
     * @param  string|array  $text
     */
    fn (string|array $text, bool $escape = false): Expectation => $this->toRenderText($text, $escape)
);

expect()->extend(
    'toContainTextInOrder',
    /**
     * Assert that the response contains the given ordered sequence of strings in its text.
     *
     * @param  string|array  $text
     */
    fn (string|array $text, bool $escape = false): Expectation => $this->toRenderTextInOrder($text, $escape)
);

expect()->extend(
    'toHaveJson',
    /**
     * Assert that the response is a superset of the given JSON.
     */
    function (array|callable $json, bool $strict = false): Expectation {
        $response = getTestableResponse($this);

        $response->assertJson($json, $strict);

        return $this;
    }
);

expect()->extend(
    'toHaveExactJson',
    /**
     * Assert that the response has the exact given JSON.
     */
    function (array $json): Expectation {
        $response = getTestableResponse($this);

        $response->assertExactJson($json);

        return $this;
    }
);

expect()->extend(
    'toHaveJsonFragment',
    /**
     * Assert that the response contains the given JSON fragment.
     */
    function (array $json): Expectation {
        $response = getTestableResponse($this);

        $response->assertJsonFragment($json);

        return $this;
    }
);

expect()->extend(
    'toHaveJsonStructure',
    /**
     * Assert that the response has a given JSON structure.
     */
    function (array $structure = null, array $responseData = null): Expectation {
        $response = getTestableResponse($this);

        $response->assertJsonStructure($structure, $responseData);

        return $this;
    }
);

expect()->extend(
    'toHaveJsonPath',
    /**
     * Assert that the expected value and type exists at the given path in the response.
     */
    function (string $path, mixed $expect): Expectation {
        $response = getTestableResponse($this);

        $response->assertJsonPath($path, $expect);

        return $this;
    }
);

expect()->extend(
    'toHaveJsonValidationErrors',
    /**
     * Assert that the response has the given JSON validation errors.
     */
    function (string|array $errors = null, string $responseKey = 'errors'): Expectation {
        $response = getTestableResponse($this);

        $response->assertJsonValidationErrors($errors ?? [], $responseKey);

        return $this;
    },
);

expect()->extend(
    'toHaveValid',
    /**
     * Assert that the response doesn't have the given validation error keys.
     *
     * @param  string|array|null  $keys
     */
    function (string|array|null $keys = null, string $errorBag = 'default', string $responseKey = 'errors'): Expectation {
        $response = getTestableResponse($this);

        $response->assertValid($keys, $errorBag, $responseKey);

        return $this;
    },
);

expect()->extend(
    'toHaveInvalid',
    /**
     * Assert that the response has the given validation error keys.
     *
     * @param  string|array|null  $keys
     */
    function (string|array|null $keys = null, string $errorBag = 'default', string $responseKey = 'errors'): Expectation {
        $response = getTestableResponse($this);

        $response->assertInvalid($keys, $errorBag, $responseKey);

        return $this;
    },
);

expect()->extend(
    'toHaveHeader',
    /**
     * Assert that the response contains the given header and equals the optional value.
     *
     * @param  mixed  $value
     */
    function (string $headerName, mixed $value = null): Expectation {
        $response = getTestableResponse($this);

        $response->assertHeader($headerName, $value);

        return $this;
    }
);

expect()->extend(
    'toHaveMissingHeader',
    /**
     * Asserts that the response does not contain the given header.
     */
    function (string $headerName): Expectation {
        $response = getTestableResponse($this);

        $response->assertHeaderMissing($headerName);

        return $this;
    }
);

expect()->extend(
    'toHaveSession',
    /**
     * Assert that the session has a given value.
     *
     * @param  mixed  $value
     * @return $this
     */
    function (string|array $key, mixed $value = null): Expectation {
        $response = getTestableResponse($this);

        $response->assertSessionHas($key, $value);

        return $this;
    }
);

expect()->extend(
    'toHaveAllSession',
    /**
     * Assert that the session has a given list of values.
     */
    function (array $bindings): Expectation {
        $response = getTestableResponse($this);

        $response->assertSessionHasAll($bindings);

        return $this;
    }
);

expect()->extend(
    'toHaveLocation',
    /**
     * Assert that the current location header matches the given URI.
     */
    function (string $uri): Expectation {
        $response = getTestableResponse($this);

        $response->assertLocation($uri);

        return $this;
    },
);
