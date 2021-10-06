<?php

declare(strict_types=1);

/*
 * Assert that the value is an instance of \Illuminate\Support\Collection
 */

use Illuminate\Support\Collection;
use Pest\Expectation;

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
