<?php

use Illuminate\Contracts\Auth\Authenticatable;
use Pest\Expectation;
use function Pest\Laravel\assertAuthenticated;
use function Pest\Laravel\assertCredentials;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertInvalidCredentials;
use function PHPUnit\Framework\assertEquals;

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
