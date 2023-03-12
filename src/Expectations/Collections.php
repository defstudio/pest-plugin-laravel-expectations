<?php

declare(strict_types=1);

use Illuminate\Support\Collection;
use Pest\Expectation;

expect()->extend(
    'toBeCollection',
    /**
     * Assert that the value is an instance of \Illuminate\Support\Collection.
     */
    fn (): Expectation => // @phpstan-ignore-next-line
$this->toBeInstanceOf(Collection::class)
);

expect()->extend(
    'toBeEloquentCollection',
    /**
     * Assert that the value is an instance of \Illuminate\Database\Eloquent\Collection.
     */
    fn (): Expectation => // @phpstan-ignore-next-line
$this->toBeInstanceOf(\Illuminate\Database\Eloquent\Collection::class)
);
