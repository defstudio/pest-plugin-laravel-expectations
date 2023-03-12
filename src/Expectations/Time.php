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
     */
    function (DateTimeInterface|string $date): Expectation {
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
     */
    function (DateTimeInterface|string $date): Expectation {
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
     */
    function (DateTimeInterface|string $from, DateTimeInterface|string $to, bool $equal = true): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);
        $expected_from = ValueProcessor::getCarbonDate($from);
        $expected_to = ValueProcessor::getCarbonDate($to);

        assertTrue($value->isBetween($expected_from, $expected_to, $equal), sprintf('Failed to assert that [%s] is between %s and %s', $value, $expected_from, $expected_to));

        return $this;
    }
);

expect()->extend(
    'toBeBirthday',
    /**
     * Assert the date a birthday.
     *
     * @param  DateTimeInterface|string|null  $date
     */
    function (DateTimeInterface|string|null $date = null): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);

        if ($date !== null) {
            $date = ValueProcessor::getCarbonDate($date);
        }

        assertTrue($value->isBirthday($date), sprintf('Failed to assert that [%s] is a birthday', $value));

        return $this;
    }
);

expect()->extend(
    'toBeCurrentDay',
    /**
     * Assert the date is today.
     */
    function (): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);

        assertTrue($value->isCurrentDay(), sprintf('Failed to assert that [%s] is today', $value));

        return $this;
    }
);

expect()->extend(
    'toBeCurrentHour',
    /**
     * Assert the date is in the current hour.
     */
    function (): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);

        assertTrue($value->isCurrentHour(), sprintf('Failed to assert that [%s] is in the current hour', $value));

        return $this;
    }
);

expect()->extend(
    'toBeCurrentMinute',
    /**
     * Assert the date is in the current minute.
     */
    function (): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);

        assertTrue($value->isCurrentMinute(), sprintf('Failed to assert that [%s] is in the current minute', $value));

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
    'toBeCurrentSecond',
    /**
     * Assert the date is in the current second.
     */
    function (): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);

        assertTrue($value->isCurrentSecond(), sprintf('Failed to assert that [%s] is in the current second', $value));

        return $this;
    }
);

expect()->extend(
    'toBeCurrentWeek',
    /**
     * Assert the date is in the current week.
     */
    function (): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);

        assertTrue($value->isCurrentWeek(), sprintf('Failed to assert that [%s] is in the current week', $value));

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
    'toBeEndOfDay',
    /**
     * Assert the date is end of day.
     */
    function (): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);

        assertTrue($value->isEndOfDay(), sprintf('Failed to assert that [%s] is end of day', $value));

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
    'toBeLastMonth',
    /**
     * Assert the date is in the last month.
     */
    function (): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);

        assertTrue($value->isLastMonth(), sprintf('Failed to assert that [%s] is in the last month', $value));

        return $this;
    }
);

expect()->extend(
    'toBeLastWeek',
    /**
     * Assert the date is in the last week.
     */
    function (): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);

        assertTrue($value->isLastWeek(), sprintf('Failed to assert that [%s] is in the last week', $value));

        return $this;
    }
);

expect()->extend(
    'toBeLastYear',
    /**
     * Assert the date is in the last year.
     */
    function (): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);

        assertTrue($value->isLastYear(), sprintf('Failed to assert that [%s] is in the last year', $value));

        return $this;
    }
);

expect()->extend(
    'toBeMidday',
    /**
     * Assert the date midday.
     */
    function (): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);

        assertTrue($value->isMidday(), sprintf('Failed to assert that [%s] is midday', $value));

        return $this;
    }
);

expect()->extend(
    'toBeMidnight',
    /**
     * Assert the date is start of day / midnight.
     */
    function (): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);

        assertTrue($value->isMidnight(), sprintf('Failed to assert that [%s] is midnight', $value));

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
    'toBeNextWeek',
    /**
     * Assert the date is in the next week.
     */
    function (): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);

        assertTrue($value->isNextWeek(), sprintf('Failed to assert that [%s] is in the next week', $value));

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
     */
    function (DateTimeInterface|string $date): Expectation {
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
     */
    function (DateTimeInterface|string $date): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);
        $expected = ValueProcessor::getCarbonDate($date);

        assertTrue($value->isSameHour($expected), sprintf('Failed to assert that [%s] is same hour as %s', $value, $expected));

        return $this;
    }
);

expect()->extend(
    'toBeSameMinuteAs',
    /**
     * Assert the date is the same minute as the given one.
     */
    function (DateTimeInterface|string $date): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);
        $expected = ValueProcessor::getCarbonDate($date);

        assertTrue($value->isSameMinute($expected), sprintf('Failed to assert that [%s] is same minute as %s', $value, $expected));

        return $this;
    }
);

expect()->extend(
    'toBeSameMonthAs',
    /**
     * Assert the date is the same month as the given one.
     */
    function (DateTimeInterface|string $date): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);
        $expected = ValueProcessor::getCarbonDate($date);

        assertTrue($value->isSameMonth($expected), sprintf('Failed to assert that [%s] is same month as %s', $value, $expected));

        return $this;
    }
);

expect()->extend(
    'toBeSameSecondAs',
    /**
     * Assert the date is the same second as the given one.
     */
    function (DateTimeInterface|string $date): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);
        $expected = ValueProcessor::getCarbonDate($date);

        assertTrue($value->isSameSecond($expected), sprintf('Failed to assert that [%s] is same second as %s', $value, $expected));

        return $this;
    }
);

expect()->extend(
    'toBeSameYearAs',
    /**
     * Assert the date is the same year as the given one.
     */
    function (DateTimeInterface|string $date): Expectation {
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
     */
    function (DateTimeInterface|string $date): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);
        $expected = ValueProcessor::getCarbonDate($date);

        assertTrue($value->isSameWeek($expected), sprintf('Failed to assert that [%s] is same week as %s', $value, $expected));

        return $this;
    }
);

expect()->extend(
    'toBeToday',
    /**
     * Assert the date is today.
     */
    fn (): Expectation => $this->toBeCurrentDay()
);

expect()->extend(
    'toBeTomorrow',
    /**
     * Assert the date is tomorrow.
     */
    function (): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);

        assertTrue($value->isTomorrow(), sprintf('Failed to assert that [%s] is tomorrow', $value));

        return $this;
    }
);

expect()->extend(
    'toBeWeekday',
    /**
     * Assert the date is a weekday (between monday and friday).
     */
    function (): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);

        assertTrue($value->isWeekday(), sprintf('Failed to assert that [%s] is a weekday', $value));

        return $this;
    }
);

expect()->extend(
    'toBeStartOfDay',
    /**
     * Assert the date is start of day / midnight.
     */
    function (): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);

        assertTrue($value->isStartOfDay(), sprintf('Failed to assert that [%s] is start of day', $value));

        return $this;
    }
);

expect()->extend(
    'toBeWeekend',
    /**
     * Assert the date is Saturday or Sunday.
     */
    function (): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);

        assertTrue($value->isWeekend(), sprintf('Failed to assert that [%s] is Saturday or Sunday', $value));

        return $this;
    }
);

expect()->extend(
    'toBeTuesday',
    /**
     * Assert the date is Tuesday.
     */
    function (): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);

        assertTrue($value->isTuesday(), sprintf('Failed to assert that [%s] is Tuesday', $value));

        return $this;
    }
);

expect()->extend(
    'toBeMonday',
    /**
     * Assert the date is Monday.
     */
    function (): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);

        assertTrue($value->isMonday(), sprintf('Failed to assert that [%s] is Monday', $value));

        return $this;
    }
);

expect()->extend(
    'toBeWednesday',
    /**
     * Assert the date is Wednesday.
     */
    function (): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);

        assertTrue($value->isWednesday(), sprintf('Failed to assert that [%s] is Wednesday', $value));

        return $this;
    }
);

expect()->extend(
    'toBeThursday',
    /**
     * Assert the date is Thursday.
     */
    function (): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);

        assertTrue($value->isThursday(), sprintf('Failed to assert that [%s] is Thursday', $value));

        return $this;
    }
);

expect()->extend(
    'toBeFriday',
    /**
     * Assert the date is Friday.
     */
    function (): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);

        assertTrue($value->isFriday(), sprintf('Failed to assert that [%s] is Friday', $value));

        return $this;
    }
);

expect()->extend(
    'toBeSaturday',
    /**
     * Assert the date is Saturday.
     */
    function (): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);

        assertTrue($value->isSaturday(), sprintf('Failed to assert that [%s] is Saturday', $value));

        return $this;
    }
);

expect()->extend(
    'toBeSunday',
    /**
     * Assert the date is Sunday.
     */
    function (): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);

        assertTrue($value->isSunday(), sprintf('Failed to assert that [%s] is Sunday', $value));

        return $this;
    }
);

expect()->extend(
    'toBeYesterday',
    /**
     * Assert the date is yesterday.
     */
    function (): Expectation {
        $value = ValueProcessor::getCarbonDate($this->value);

        assertTrue($value->isYesterday(), sprintf('Failed to assert that [%s] is yesterday', $value));

        return $this;
    }
);
