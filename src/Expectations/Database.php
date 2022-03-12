<?php

declare(strict_types=1);

namespace DefStudio\PestLaravelExpectations;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Str;
use Pest\Expectation;
use function Pest\Laravel\assertDatabaseHas;
use PHPUnit\Framework\Assert;

expect()->extend(
    'toBeInDatabase',
    /**
     * Assert that the given "where condition" exists in the database.
     */
    function (string $table, string $connection = null): Expectation {
        assertDatabaseHas($table, $this->value, $connection);

        return $this;
    }
);

expect()->extend('toMatchQuery', function (string $sql, array $bindings, bool $exact = true) {
    /** @var Builder|Relation $query */
    $query = $this->value;

    if ($exact) {
        Assert::assertSame($sql, $query->toSql());
        Assert::assertSame($bindings, $query->getBindings());
    } else {
        Assert::assertStringContainsString($sql, $query->toSql());

        $bindingsCountBefore = Str::of($query->toSql())->before($sql)->substrCount('?');

        $queryBindings = $query->getBindings();
        $queryBindings = array_slice($queryBindings, $bindingsCountBefore, count($bindings));

        Assert::assertSame($bindings, $queryBindings);
    }
});
