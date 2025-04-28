<?php

declare(strict_types=1);

namespace DefStudio\PestLaravelExpectations\Helpers;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use DefStudio\PestLaravelExpectations\Exceptions\InvalidDataException;

/**
 * @internal
 */
final class ValueProcessor
{
    /**
     * @throws InvalidDataException
     */
    public static function getCarbonDate(mixed $value): CarbonInterface
    {
        $carbon = Carbon::make($value);

        if (! $carbon instanceof Carbon) {
            throw InvalidDataException::cannotCast($value, Carbon::class);
        }

        return $carbon;
    }
}
