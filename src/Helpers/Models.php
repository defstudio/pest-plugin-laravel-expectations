<?php

declare(strict_types=1);

namespace DefStudio\PestLaravelExpectations\Helpers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @internal
 */
final class Models
{
    public static function findRelationshipName(Model $model, Model $related): string
    {
        $relationshipName = Str::camel(class_basename($related));

        if (!method_exists($model, $relationshipName)) {
            $relationshipName = Str::snake(class_basename($related));
        }

        return $relationshipName;
    }
}
