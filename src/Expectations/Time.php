<?php

/** @noinspection PhpDocMissingThrowsInspection */

declare(strict_types=1);

use DefStudio\PestLaravelExpectations\Helpers\ValueProcessor;
use Pest\Expectation;
use function PHPUnit\Framework\assertTrue;

expect()->extend(
    'toBeAfter',
    /**
     * Assert the date is after the given one.
     *
     * @param DateTimeInterface|string $date
     */
    function ($date): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);
        $expected = ValueProcessor::getCarbonDate($date);

        assertTrue($value->isAfter($expected), sprintf('Failed to assert that [%s] is after %s', $value, $expected));

        return $this;
    }
);

expect()->extend(
    'toBeBefore',
    /**
     * Assert the date is before the given one.
     *
     * @param DateTimeInterface|string $date
     */
    function ($date): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);
        $expected = ValueProcessor::getCarbonDate($date);

        assertTrue($value->isBefore($expected), sprintf('Failed to assert that [%s] is before %s', $value, $expected));

        return $this;
    }
);

expect()->extend(
    'toBeBetween',
    /**
     * Assert the date is between the given ones.
     *
     * @param DateTimeInterface|string $from
     * @param DateTimeInterface|string $to
     */
    function ($from, $to, bool $equal = true): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);
        $expected_from = ValueProcessor::getCarbonDate($from);
        $expected_to = ValueProcessor::getCarbonDate($to);

        assertTrue($value->isBetween($expected_from, $expected_to, $equal), sprintf('Failed to assert that [%s] is between %s and %s', $value, $expected_from, $expected_to));

        return $this;
    }
);

expect()->extend(
    'toBeCurrentMonth',
    /**
     * Assert the date is in the current month.
     */
    function (): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);

        assertTrue($value->isCurrentMonth(), sprintf('Failed to assert that [%s] is in the current month', $value));

        return $this;
    }
);

expect()->extend(
    'toBeCurrentYear',
    /**
     * Assert the date is in the current year.
     */
    function (): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);

        assertTrue($value->isCurrentYear(), sprintf('Failed to assert that [%s] is in the current year', $value));

        return $this;
    }
);

expect()->extend(
    'toBeFuture',
    /**
     * Assert the date is in the future.
     */
    function (): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);

        assertTrue($value->isFuture(), sprintf('Failed to assert that [%s] is in the future', $value));

        return $this;
    }
);

expect()->extend(
    'toBeLastYear',
    /**
     * Assert the date is in the next year.
     */
    function (): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);

        assertTrue($value->isLastYear(), sprintf('Failed to assert that [%s] is in the last year', $value));

        return $this;
    }
);

expect()->extend(
    'toBeNextYear',
    /**
     * Assert the date is in the next year.
     */
    function (): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);

        assertTrue($value->isNextYear(), sprintf('Failed to assert that [%s] is in the next year', $value));

        return $this;
    }
);

expect()->extend(
    'toBeNextMonth',
    /**
     * Assert the date is in the next month.
     */
    function (): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);

        assertTrue($value->isNextMonth(), sprintf('Failed to assert that [%s] is in the next month', $value));

        return $this;
    }
);

expect()->extend(
    'toBePast',
    /**
     * Assert the date is in the past.
     */
    function (): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);

        assertTrue($value->isPast(), sprintf('Failed to assert that [%s] is in the past', $value));

        return $this;
    }
);

expect()->extend(
    'toBeSameDayAs',
    /**
     * Assert the date is the same day as the given one.
     *
     * @param DateTimeInterface|string $date
     */
    function ($date): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);
        $expected = ValueProcessor::getCarbonDate($date);

        assertTrue($value->isSameDay($expected), sprintf('Failed to assert that [%s] is same day as %s', $value, $expected));

        return $this;
    }
);

expect()->extend(
    'toBeSameHourAs',
    /**
     * Assert the date is the same hour as the given one.
     *
     * @param DateTimeInterface|string $date
     */
    function ($date): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);
        $expected = ValueProcessor::getCarbonDate($date);

        assertTrue($value->isSameHour($expected), sprintf('Failed to assert that [%s] is same hour as %s', $value, $expected));

        return $this;
    }
);

expect()->extend(
    'toBeSameMonthAs',
    /**
     * Assert the date is the same month as the given one.
     *
     * @param DateTimeInterface|string $date
     */
    function ($date): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);
        $expected = ValueProcessor::getCarbonDate($date);

        assertTrue($value->isSameMonth($expected), sprintf('Failed to assert that [%s] is same month as %s', $value, $expected));

        return $this;
    }
);

expect()->extend(
    'toBeSameYearAs',
    /**
     * Assert the date is the same year as the given one.
     *
     * @param DateTimeInterface|string $date
     */
    function ($date): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);
        $expected = ValueProcessor::getCarbonDate($date);

        assertTrue($value->isSameYear($expected), sprintf('Failed to assert that [%s] is same year as %s', $value, $expected));

        return $this;
    }
);

expect()->extend(
    'toBeSameWeekAs',
    /**
     * Assert the date is the same week as the given one.
     *
     * @param DateTimeInterface|string $date
     */
    function ($date): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);
        $expected = ValueProcessor::getCarbonDate($date);

        assertTrue($value->isSameWeek($expected), sprintf('Failed to assert that [%s] is same week as %s', $value, $expected));

        return $this;
    }
);
