<?php

/** @noinspection DuplicatedCode */
/* @noinspection PhpUndefinedFieldInspection */
/* @noinspection PhpMethodParametersCountMismatchInspection */

declare(strict_types=1);

use Pest\Expectation;

expect()->extend(
    'toBeView',
    /**
     * Assert that the given view is an instance of view and name is identical with data passed.
     * Assert that view contains the provided data.
     */
    function (string $name, array $data = []): Expectation {
        // @phpstan-ignore-next-line
        $this->toBeInstanceOf(\Illuminate\View\View::class)
            ->name()->toBe($name)
            ->getData()->toHaveKeys($data);

        return $this;
    }
);
