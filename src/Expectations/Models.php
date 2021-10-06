<?php

/** @noinspection DuplicatedCode */

/* @noinspection PhpUndefinedFieldInspection */
/* @noinspection PhpMethodParametersCountMismatchInspection */

declare(strict_types=1);

use DefStudio\PestLaravelExpectations\Helpers\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Pest\Expectation;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDeleted;
use function Pest\Laravel\assertSoftDeleted;
use function PHPUnit\Framework\assertEquals;

/*
 * Asserts that the given model exists in the database.
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
 * Assert that the given model is deleted.
 */
expect()->extend('toBeDeleted', function (): Expectation {
    assertDeleted($this->value);

    return $this;
});

/*
 * Assert that the given model is soft deleted.
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
 * Asserts that the given model have a child model
 */
expect()->extend('toHave', function (Model $related, string $relationshipName = ''): Expectation {
    /** @var Model $model */
    $model = $this->value;

    $guesser = Models\RelationshipGuesser::from($model)
        ->to($related)
        ->ofType(HasOne::class)
        ->withHint($relationshipName)
        ->throwException(false);

    $relationshipName = $guesser->guess();

    $relationshipName = $relationshipName ?: $guesser->ofType(HasMany::class)->throwException(true)->guess();

    $foreignKey = $guesser->getRelationship()->getForeignKeyName();

    $modelClass = get_class($model);
    $relatedClass = get_class($related);

    //@phpstan-ignore-next-line
    assertEquals($relatedClass, get_class($guesser->getRelationship()->getModel()), "Failed asserting that [$modelClass#$model->id] has a relationship '$relationshipName' with [$relatedClass#$related->id]");

    assertEquals($related->$foreignKey, $model->id, "Failed asserting that [$modelClass#$model->id] has a relationship with [$relatedClass#$related->id]");

    return $this;
});

/*
 * Asserts that the given model belongs to a parent model
 */
expect()->extend('toBelongTo', function (Model $related, string $relationshipName = ''): Expectation {
    /** @var Model $model */
    $model = $this->value;

    $guesser = Models\RelationshipGuesser::from($model)
    ->to($related)
    ->ofType(BelongsTo::class)
    ->withHint($relationshipName);

    $relationshipName = $guesser->guess();

    $foreignKey = $guesser->getRelationship()->getForeignKeyName();

    $modelClass = get_class($model);
    $relatedClass = get_class($related);

    //@phpstan-ignore-next-line
    assertEquals($relatedClass, get_class($guesser->getRelationship()->getModel()), "Failed asserting that [$modelClass#$model->id] belongs to [$relatedClass#$related->id] through its relationship '$relationshipName'");

    assertEquals($model->$foreignKey, $related->id, "Failed asserting that [$modelClass#$model->id] belongs to [$relatedClass#$related->id]");

    return $this;
});
