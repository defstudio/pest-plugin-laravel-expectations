<?php

declare(strict_types=1);

namespace DefStudio\PestLaravelExpectations\Helpers\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;
use PHPUnit\Framework\ExpectationFailedException;

/**
 * @internal
 */
final class RelationshipGuesser
{
    /** @var Model */
    private $model;

    /** @var Model */
    private $related;

    /** @var string */
    private $relationshipClass;

    /** @var string */
    private $hintedRelationshipName = '';

    /** @var Array<string> */
    private $triedRelationshipNames = [];

    /** @var string */
    private $foundRelationshipName = '';

    /** @var bool */
    private $throwException = true;

    public static function from(Model $model): self
    {
        $guesser        = new self();
        $guesser->model = $model;

        return $guesser;
    }

    public function to(Model $related): self
    {
        $this->related = $related;

        return $this;
    }

    public function ofType(string $relationshipClass): self
    {
        $this->relationshipClass = $relationshipClass;

        return $this;
    }

    public function withHint(string $relationshipName): self
    {
        $this->hintedRelationshipName = $relationshipName;

        return $this;
    }

    public function throwException(bool $throw): self
    {
        $this->throwException = $throw;

        return $this;
    }

    public function guess(): string
    {
        if (!empty($this->hintedRelationshipName)) {
            $this->foundRelationshipName = $this->hintedRelationshipName;
        }

        if ($this->relationshipClass == BelongsTo::class) {
            $this->try(Str::camel(class_basename($this->related)));
            $this->try(Str::snake(class_basename($this->related)));
        }

        if ($this->relationshipClass == HasOne::class) {
            $this->try(Str::camel(class_basename($this->related)));
            $this->try(Str::snake(class_basename($this->related)));
        }

        if ($this->relationshipClass == HasMany::class) {
            $this->try(Str::camel(Str::plural(class_basename($this->related))));
            $this->try(Str::snake(Str::plural(class_basename($this->related))));
        }

        if ($this->throwException && empty($this->foundRelationshipName)) {
            $triedNames = implode(' / ', array_unique($this->triedRelationshipNames));
            throw new ExpectationFailedException(sprintf('Failed to assert that [%s] has relationship [%s]', get_class($this->model), $triedNames));
        }

        return $this->foundRelationshipName;
    }

    private function try(string $relationshipName): void
    {
        if (empty($relationshipName)) {
            return;
        }

        if (!empty($this->foundRelationshipName)) {
            return;
        }

        $this->triedRelationshipNames[] = $relationshipName;

        if (method_exists($this->model, $relationshipName)) {
            $this->validateRelationship($relationshipName);
            $this->foundRelationshipName = $relationshipName;
        }
    }

    private function validateRelationship(string $relationshipName): void
    {
        if (!$this->model->{$relationshipName}() instanceof $this->relationshipClass) {
            throw new ExpectationFailedException(sprintf('Failed to assert that [%s] has relationship [%s] of type [%s]', get_class($this->model), $relationshipName, $this->relationshipClass));
        }
    }

    /**
     * @return HasOne|HasMany|BelongsTo
     */
    public function getRelationship()
    {
        return $this->model->{$this->foundRelationshipName}();
    }
}
