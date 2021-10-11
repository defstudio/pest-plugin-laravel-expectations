<?php

declare(strict_types=1);

namespace DefStudio\PestLaravelExpectations;

use Pest\Expectation;
use function Pest\Laravel\assertDatabaseHas;


expect()->extend(
    'toBeInDatabase',
    /*
     * Assert that the given "where condition" exists in the database
     */
    function (string $table, string $connection = null): Expectation {
        assertDatabaseHas($table, $this->value, $connection);

        return $this;
    }
);
