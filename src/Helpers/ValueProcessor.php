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
     * @param mixed $value
     *
     * @throws InvalidDataException
     */
    public static function getCarbonDate($value): CarbonInterface
    {
        $carbon = Carbon::make($value);

        if ($carbon === null) {
            throw InvalidDataException::cannotCast($value, Carbon::class);
        }

        return $carbon;
    }
}
