<?php

declare(strict_types=1);

namespace DefStudio\PestLaravelExpectations;

use Pest\Expectation;
use function Pest\Laravel\assertDatabaseHas;

/*
 * Assert that the given "where condition" exists in the database
 */
expect()->extend('toBeInDatabase', function (string $table, string $connection = null): Expectation {
    assertDatabaseHas($table, $this->value, $connection);

    return $this;
});
