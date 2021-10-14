<?php

declare(strict_types=1);

use Illuminate\Testing\TestResponse;
use Pest\Expectation;
use PHPUnit\Framework\AssertionFailedError;
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
     * Assert that the given response has a successful status code.
     */
    function (): Expectation {
        /** @var TestResponse $response */
        $response = $this->value;
        $response->assertSuccessful();

        return $this;
    }
);

expect()->extend(
    'toHaveStatus',
    /**
     * Assert that the given response has a specific status code.
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
     * Assert that the given response offers a file download.
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
    /*
     * Assert that the given response contains a string or array of strings.
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
    /*
     * Assert that the given response contains an ordered sequence of strings
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
    /*
     * Assert that the given response contains a string or array of strings in its text.
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
    /*
     * Assert that the given response contains an ordered sequence of strings in its text.
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
    /*
     * Assert that the given response contains a string or array of strings in its text.
     *
     * @param string|array $text
     */
    function ($text, bool $escape = false): Expectation {
        return $this->toRenderText($text, $escape);
    }
);

expect()->extend(
    'toContainTextInOrder',
    /*
     * Assert that the given response contains an ordered sequence of strings in its text.
     *
     * @param string|array $text
     */
    function ($text, bool $escape = false): Expectation {
        return $this->toRenderTextInOrder($text, $escape);
    }
);
