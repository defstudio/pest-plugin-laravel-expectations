<?php

declare(strict_types=1);

namespace DefStudio\PestLaravelExpectations;

use Illuminate\Support\Collection;
use Pest\Expectation;
use function Pest\Laravel\assertDatabaseHas;

/*
 * Asserts the given model exists in the database.
 */
expect()->extend('toExist', function (): Expectation {
    assertDatabaseHas(
        $this->value->getTable(),
        [$this->value->getKeyName() => $this->value->getKey()],
        $this->value->getConnectionName()
    );

    return $this;
});

/*
 * Asserts that the given "where condition" exists in the database
 *
 * @param \Illuminate\Database\Eloquent\Model|string $table
 * @param string|null $connection
 */
expect()->extend('toBeInDatabase', function ($table, $connection = null): Expectation {
    assertDatabaseHas($table, $this->value, $connection);

    return $this;
});

/*
 * Asserts that the value is an instance of \Illuminate\Support\Collection
 */
expect()->extend('toBeCollection', function (): Expectation {
    // @phpstan-ignore-next-line
    return $this->toBeInstanceOf(Collection::class);
});

/*
 * Asserts that the value is an instance of \Illuminate\Database\Eloquent\Collection
 */
expect()->extend('toBeEloquentCollection', function (): Expectation {
    // @phpstan-ignore-next-line
    return $this->toBeInstanceOf(\Illuminate\Database\Eloquent\Collection::class);
});
