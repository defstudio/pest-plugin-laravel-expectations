<?php

/** @noinspection PhpUndefinedFieldInspection */
/* @noinspection PhpMethodParametersCountMismatchInspection */
declare(strict_types=1);

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\RelationNotFoundException;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Pest\Expectation;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDeleted;
use function Pest\Laravel\assertSoftDeleted;
use function PHPUnit\Framework\assertEquals;

/*
 * Assert the given model exists in the database.
 */
expect()->extend('toExist', function (): Expectation {
    assertDatabaseHas(
        $this->value->getTable(),
        [$this->value->getKeyName() => $this->value->getKey()],
        $this->value->getConnectionName()
    );

    return $this;
});

/*
 * Assert the given model to be deleted.
 */
expect()->extend('toBeDeleted', function (): Expectation {
    assertDeleted($this->value);

    return $this;
});

/*
 * Asserts the given model to be soft deleted.
 */
expect()->extend('toBeSoftDeleted', function (string $deletedAtColumn = 'deleted_at'): Expectation {
    assertSoftDeleted(
        $this->value,
        [],
        null,
        $deletedAtColumn
    );

    return $this;
});

/*
 * Asserts the given model to belong to a parent model
 */
expect()->extend('toBelongTo', function (Model $related, string $relationshipName = null): Expectation {
    /** @var Model $model */
    $model = $this->value;

    $foundRelationshipName = $relationshipName;
    if ($foundRelationshipName === null) {
        $foundRelationshipName = Str::camel(class_basename($related));

        if (!method_exists($model, $foundRelationshipName)) {
            $foundRelationshipName = Str::snake(class_basename($related));
        }
    }

    try {
        $relationship = $model->{$foundRelationshipName}();
    } catch (BadMethodCallException $exception) {
        throw RelationNotFoundException::make($model, $foundRelationshipName);
    }

    if (!$relationship instanceof BelongsTo) {
        throw RelationNotFoundException::make($model, $foundRelationshipName);
    }

    $foreignKey = $relationship->getForeignKeyName();

    $modelClass = get_class($model);
    $relatedClass = get_class($related);

    //@phpstan-ignore-next-line
    assertEquals($relatedClass, get_class($relationship->getModel()), "Failed asserting that the model $modelClass#$model->id belongs to the model $relatedClass#$related->id through its relationship $foundRelationshipName");

    assertEquals($model->$foreignKey, $related->id, "Failed asserting that the model $modelClass#$model->id belongs to the model $relatedClass#$related->id");

    return $this;
});
