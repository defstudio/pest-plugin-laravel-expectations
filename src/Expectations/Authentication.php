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

/*
 * Assert that the given User is authenticated
 */
expect()->extend('toBeAuthenticated', function (string $guard = null): Expectation {
    assertAuthenticated($guard);

    $authenticated = Auth::user();
    assertEquals($this->value->id, $authenticated->id, "The User ID #{$this->value->id} doesn't match authenticated User ID #$authenticated->id");

    return $this;
});

/*
 * Assert that the given credentials are valid.
 */
expect()->extend('toBeValidCredentials', function (string $guard = null): Expectation {
    assertCredentials($this->value, $guard);

    return $this;
});

/*
 * Assert that the given credentials are invalid.
 */
expect()->extend('toBeInvalidCredentials', function (string $guard = null): Expectation {
    assertInvalidCredentials($this->value, $guard);

    return $this;
});

/*
 * Assert that the given User is authorized to do something
 *
 * @param array|mixed $arguments
 */
expect()->extend('toBeAbleTo', function (string $ability, $arguments = []): Expectation {
    /** @var Authorizable $user */
    $user = $this->value;

    $exporter = new Exporter();

    $arguments_string = $exporter->shortenedExport($arguments);
    assertTrue($user->can($ability, $arguments), sprintf('Failed asserting that the given user is authorized to "%s" with [%s]', $ability, $arguments_string));

    return $this;
});
