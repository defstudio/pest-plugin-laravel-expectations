<?php

declare(strict_types=1);

use Illuminate\Testing\TestResponse;
use Pest\Expectation;
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\ExpectationFailedException;

expect()->extend(
    'toBeRedirect',
    /**
     * Assert that the response is a redirection.
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
    'toBeRedirectToSignedRoute',
    /**
     * Assert whether the response is redirecting to a given signed route.
     *
     * @param mixed $parameters
     */
    function (string $name = null, $parameters = []): Expectation {
        /** @var TestResponse $response */
        $response = $this->value;
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
        /** @var TestResponse $response */
        $response = $this->value;
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
        /** @var TestResponse $response */
        $response = $this->value;
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
        /** @var TestResponse $response */
        $response = $this->value;
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
        /** @var TestResponse $response */
        $response = $this->value;
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
        /** @var TestResponse $response */
        $response = $this->value;
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
        /** @var TestResponse $response */
        $response = $this->value;
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
        /** @var TestResponse $response */
        $response = $this->value;
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
        /** @var TestResponse $response */
        $response = $this->value;
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
        /** @var TestResponse $response */
        $response = $this->value;

        try {
            $response->assertDownload($filename);
        } catch (AssertionFailedError $exception) {
            throw new ExpectationFailedException($exception->getMessage());
        }

        return $this;
    }
);

//TODO: alias with ->toContain() when the pipe PR gets merged
expect()->extend(
    'toRender',
    /**
     * Assert that the response contains the given string or array of strings.
     *
     * @param string|array $string
     */
    function ($string, bool $escape = false): Expectation {
        /** @var TestResponse $response */
        $response = $this->value;
        $response->assertSee($string, $escape);

        return $this;
    }
);

//TODO: alias with ->toContainInOrder() when the pipe PR gets merged
expect()->extend(
    'toRenderInOrder',
    /**
     * Assert that the response contains the given ordered sequence of strings.
     */
    function (array $strings, bool $escape = false): Expectation {
        /** @var TestResponse $response */
        $response = $this->value;
        $response->assertSeeInOrder($strings, $escape);

        return $this;
    }
);

expect()->extend(
    'toRenderText',
    /**
     * Assert that the response contains the given string or array of strings in its text.
     *
     * @param string|array $text
     */
    function ($text, bool $escape = false): Expectation {
        /** @var TestResponse $response */
        $response = $this->value;
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
        /** @var TestResponse $response */
        $response = $this->value;
        $response->assertSeeTextInOrder($texts, $escape);

        return $this;
    }
);

expect()->extend(
    'toContainText',
    /**
     * Assert that the response contains the fiven string or array of strings in its text.
     *
     * @param string|array $text
     */
    function ($text, bool $escape = false): Expectation {
        return $this->toRenderText($text, $escape);
    }
);

expect()->extend(
    'toContainTextInOrder',
    /**
     * Assert that the response contains the given ordered sequence of strings in its text.
     *
     * @param string|array $text
     */
    function ($text, bool $escape = false): Expectation {
        return $this->toRenderTextInOrder($text, $escape);
    }
);

expect()->extend(
    'toHaveJson',
    /**
     * Assert that the response is a superset of the given JSON.
     *
     * @param array|callable $json
     */
    function ($json, bool $strict = false): Expectation {
        /** @var TestResponse $response */
        $response = $this->value;

        $response->assertJson($json, $strict);

        return $this;
    }
);

expect()->extend(
    'toHaveExactJson',
    /**
     * Assert that the response has the exact given JSON.
     *
     * @param array|callable $json
     */
    function ($json): Expectation {
        /** @var TestResponse $response */
        $response = $this->value;

        $response->assertExactJson($json);

        return $this;
    }
);

expect()->extend(
    'toHaveJsonFragment',
    /**
     * Assert that the response contains the given JSON fragment.
     *
     * @param array|callable $json
     */
    function ($json): Expectation {
        /** @var TestResponse $response */
        $response = $this->value;

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
        /** @var TestResponse $response */
        $response = $this->value;

        $response->assertJsonStructure($structure, $responseData);

        return $this;
    }
);

expect()->extend(
    'toHaveJsonPath',
    /**
     * Assert that the expected value and type exists at the given path in the response.
     *
     * @param mixed $expect
     */
    function (string $path, $expect): Expectation {
        /** @var TestResponse $response */
        $response = $this->value;

        $response->assertJsonPath($path, $expect);

        return $this;
    }
);

expect()->extend(
    'toHaveJsonValidationErrors',
    /**
     * Assert that the response has the given JSON validation errors.
     *
     * @param string|array $errors
     */
    function ($errors = null, string $responseKey = 'errors'): Expectation {
        /** @var TestResponse $response */
        $response = $this->value;
        $response->assertJsonValidationErrors($errors, $responseKey);

        return $this;
    },
);

expect()->extend(
    'toHaveValid',
    /**
     * Assert that the response doesn't have the given validation error keys.
     *
     * @param string|array|null $keys
     */
    function ($keys = null, string $errorBag = 'default', string $responseKey = 'errors'): Expectation {
        /** @var TestResponse $response */
        $response = $this->value;
        $response->assertValid($keys, $errorBag, $responseKey);

        return $this;
    },
);

expect()->extend(
    'toHaveInvalid',
    /**
     * Assert that the response has the given validation error keys.
     *
     * @param string|array|null $keys
     */
    function ($keys = null, string $errorBag = 'default', string $responseKey = 'errors'): Expectation {
        /** @var TestResponse $response */
        $response = $this->value;
        $response->assertInvalid($keys, $errorBag, $responseKey);

        return $this;
    },
);

expect()->extend(
    'toHaveHeader',
    /**
     * Assert that the response contains the given header and equals the optional value.
     *
     * @param mixed  $value
     */
    function (string $headerName, $value = null): Expectation {
        /** @var TestResponse $response */
        $response = $this->value;
        $response->assertHeader($headerName, $value);

        return $this;
    }
);

expect()->extend(
    'toHaveLocation',
    /**
     * Assert that the current location header matches the given URI.
     */
    function (string $uri): Expectation {
        /** @var TestResponse $response */
        $response = $this->value;
        $response->assertLocation($uri);

        return $this;
    },
);
