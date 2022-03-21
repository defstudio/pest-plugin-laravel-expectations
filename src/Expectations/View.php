<?php

/** @noinspection DuplicatedCode */
/* @noinspection PhpUndefinedFieldInspection */
/* @noinspection PhpMethodParametersCountMismatchInspection */

declare(strict_types=1);

use Pest\Expectation;

expect()->extend(
    'toBeView',
    /**
     * Assert that the value is an instance of \Illuminate\View\View, also name and data is identical with data passed.
     */
    function (string $name, array $data = []): Expectation {
        // @phpstan-ignore-next-line
        $this->toBeInstanceOf(\Illuminate\View\View::class)
            ->name()->toBe($name)
            ->getData()->toMatchArray($data);

        return $this;
    }
);
