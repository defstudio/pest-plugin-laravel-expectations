<?php

declare(strict_types=1);

use Illuminate\Validation\ValidationException;
use Pest\Expectation;

expect()->extend(
    'toThrowValidationException',
    /**
     * Assert that the given expectation errors are thrown
     *
     * @phpstan-ignore-next-line
     */
    fn (?array $errors = null): Expectation => expect($this->value)->toThrow(function (ValidationException $exception) use ($errors): void {
        if ($errors !== null) {
            expect($exception->errors())->toBe($errors);
        }
    }));
