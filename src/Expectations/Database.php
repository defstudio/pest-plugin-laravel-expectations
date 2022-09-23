<?php

declare(strict_types=1);

namespace DefStudio\PestLaravelExpectations;

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
    if ($exact) {
        Assert::assertSame($sql, $this->value->toSql());
        Assert::assertSame($bindings, $this->value->getBindings());
    } else {
        Assert::assertStringContainsString($sql, $this->value->toSql());

        $bindingsCountBefore = Str::of($this->value->toSql())->before($sql)->substrCount('?');

        $queryBindings = $this->value->getBindings();
        $queryBindings = array_slice($queryBindings, $bindingsCountBefore, count($bindings));

        Assert::assertSame($bindings, $queryBindings);
    }
});
