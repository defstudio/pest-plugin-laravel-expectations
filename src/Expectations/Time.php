<?php

declare(strict_types=1);

use Illuminate\Support\Carbon;
use Pest\Expectation;
use function PHPUnit\Framework\assertTrue;
use PHPUnit\Framework\ExpectationFailedException;
use SebastianBergmann\Exporter\Exporter;

expect()->extend(
    'toBeSameDayAs',
    /**
     * Assert the date is the same day as the given one.
     *
     * @param DateTimeInterface|string $date
     */
    function ($date): Expectation {
        $value = Carbon::make($this->value);
        $expected = Carbon::make($date);

        $exporter = new Exporter();
        $toString = function ($argument) use ($exporter): string {
            return $exporter->shortenedExport($argument);
        };

        if ($value === null) {
            throw new ExpectationFailedException(sprintf('Impossible to cast [%s] to a Carbon instance', $toString($this->value)));
        }

        assertTrue($value->isSameDay($expected), sprintf('Failed to assert that [%s] is same day as %s', $value, $expected));

        return $this;
    }
);
