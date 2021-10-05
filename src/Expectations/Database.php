<?php

declare(strict_types=1);

namespace DefStudio\PestLaravelExpectations;

use Illuminate\Support\Collection;
use Pest\Expectation;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDeleted;
use function Pest\Laravel\assertSoftDeleted;

/*
 * Assert the given model exists in the database.
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
 * Assert the given model to be deleted.
 */
expect()->extend('toBeDeleted', function (): Expectation {
    assertDeleted($this->value);

    return $this;
});

/*
 * Asserts the given model to be soft deleted.
 */
expect()->extend('toBeSoftDeleted', function (string $deletedAtColumn = 'deleted_at'): Expectation {
    assertSoftDeleted(
        $this->value,
        [],
        null,
        $deletedAtColumn
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

/*
 * Assert that the value is an instance of \Illuminate\Support\Collection
 */
expect()->extend('toBeCollection', function (): Expectation {
    // @phpstan-ignore-next-line
    return $this->toBeInstanceOf(Collection::class);
});

/*
 * Assert that the value is an instance of \Illuminate\Database\Eloquent\Collection
 */
expect()->extend('toBeEloquentCollection', function (): Expectation {
    // @phpstan-ignore-next-line
    return $this->toBeInstanceOf(\Illuminate\Database\Eloquent\Collection::class);
});
