<?php

declare(strict_types=1);

use Illuminate\Contracts\Auth\Access\Authorizable;
use Pest\Expectation;
use function Pest\Laravel\assertAuthenticated;
use function Pest\Laravel\assertCredentials;
use function Pest\Laravel\assertInvalidCredentials;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertTrue;
use SebastianBergmann\Exporter\Exporter;
use Illuminate\Support\Facades\Auth;

expect()->extend(
    'toBeAuthenticated',
    /**
     * Assert that the given User is authenticated.
     */
    function (string $guard = null): Expectation {
        assertAuthenticated($guard);

        $authenticated = Auth::guard($guard)->user();
        assertNotNull($authenticated, "No authenticated user found with guard '$guard'");
        
        assertEquals($this->value->id, $authenticated->id, "The User ID #{$this->value->id} doesn't match authenticated User ID #$authenticated->id");

        return $this;
    }
);

expect()->extend(
    'toBeValidCredentials',
    /**
     * Assert that the given credentials are valid.
     */
    function (string $guard = null): Expectation {
        assertCredentials($this->value, $guard);

        return $this;
    }
);

expect()->extend(
    'toBeInvalidCredentials',
    /**
     * Assert that the given credentials are invalid.
     */
    function (string $guard = null): Expectation {
        assertInvalidCredentials($this->value, $guard);

        return $this;
    }
);

expect()->extend(
    'toBeAbleTo',
    /**
     * @param array|mixed $arguments
     */
    function (string $ability, $arguments = []): Expectation {
        /** @var Authorizable $user */
        $user = $this->value;

        $exporter = new Exporter();

        $arguments_string = $exporter->shortenedExport($arguments);
        assertTrue($user->can($ability, $arguments), sprintf('Failed asserting that the given user is authorized to "%s" with [%s]', $ability, $arguments_string));

        return $this;
    }
);
