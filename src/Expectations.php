<?php

declare(strict_types=1);

namespace DefStudio\PestLaravelExpectations;

/*
 * Assert the given model exists in the database.
 */

use Pest\Expectation;
use function Pest\Laravel\assertDatabaseHas;

expect()->extend('toExist', function (): Expectation {
    assertDatabaseHas(
        $this->value->getTable(),
        [$this->value->getKeyName() => $this->value->getKey()],
        $this->value->getConnectionName()
    );

    return $this;
});

/*
 * Assert that the given "where condition" exists in the database
 *
 * @param \Illuminate\Database\Eloquent\Model|string $table
 * @param string|null $connection
 */
expect()->extend('toBeInDatabase', function ($table, $connection = null): Expectation {
    assertDatabaseHas($table, $this->value, $connection);

    return $this;
});
