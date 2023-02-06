<?php

declare(strict_types=1);

use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Pest\Expectation;
use SebastianBergmann\Exporter\Exporter;

use function Pest\Laravel\assertAuthenticated;
use function Pest\Laravel\assertCredentials;
use function Pest\Laravel\assertInvalidCredentials;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertTrue;

expect()->extend(
    'toBeAuthenticated',
    /**
     * Assert that the given User is authenticated.
     */
    function (string $guard = null): Expectation {
        assertAuthenticated($guard);

        /** @var Authenticatable $authenticated */
        $authenticated = Auth::guard($guard)->user();

        // @phpstan-ignore-next-line
        assertEquals($this->value->id, $authenticated->id, "The User ID #{$this->value->id} doesn't match authenticated User ID #{$authenticated->id}");

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
