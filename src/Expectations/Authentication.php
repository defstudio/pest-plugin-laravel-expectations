<?php

use Illuminate\Contracts\Auth\Authenticatable;
use Pest\Expectation;
use function Pest\Laravel\assertAuthenticated;
use function Pest\Laravel\assertDatabaseHas;
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
