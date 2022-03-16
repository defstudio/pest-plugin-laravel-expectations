<?php

/** @noinspection DuplicatedCode */

/* @noinspection PhpUndefinedFieldInspection */
/* @noinspection PhpMethodParametersCountMismatchInspection */

declare(strict_types=1);

use Pest\Expectation;

expect()->extend(
    'toBeView',
    /**
     * Assert that the given view is an instance of view and name is identical
     */
    function (string $name): Expectation {
        /** @var \Illuminate\View\View $view */
        $view = $this->value;

        expect($view)
            ->toBeInstanceOf(\Illuminate\View\View::class)
            ->name()->toBe($name);

        return $this;
    }
);
