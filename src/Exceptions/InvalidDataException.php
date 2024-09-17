<?php

declare(strict_types=1);

namespace DefStudio\PestLaravelExpectations\Exceptions;

use SebastianBergmann\Exporter\Exporter;

final class InvalidDataException extends \Exception
{
    public static function cannotCast(mixed $value, string $class): InvalidDataException
    {
        $exporter = new Exporter;

        return new self(sprintf('Cannot cast [%s] to a %s instance', $exporter->shortenedExport($value), $class));
    }
}
