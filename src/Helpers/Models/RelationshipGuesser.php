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
    private ?Model $model = null;

    private ?Model $related = null;

    private ?string $relationshipClass = null;

    private string $hintedRelationshipName = '';

    /** @var array<string> */
    private array $triedRelationshipNames = [];

    private string $foundRelationshipName = '';

    private bool $throwException = true;

    public static function from(Model $model): self
    {
        $guesser = new self;
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
        if ($this->hintedRelationshipName !== '' && $this->hintedRelationshipName !== '0') {
            $this->foundRelationshipName = $this->hintedRelationshipName;
        }

        if ($this->relationshipClass == BelongsTo::class) {
            $this->try(Str::camel(class_basename($this->related))); // @phpstan-ignore-line
            $this->try(Str::snake(class_basename($this->related))); // @phpstan-ignore-line
        }

        if ($this->relationshipClass == HasOne::class) {
            $this->try(Str::camel(class_basename($this->related))); // @phpstan-ignore-line
            $this->try(Str::snake(class_basename($this->related))); // @phpstan-ignore-line
        }

        if ($this->relationshipClass == HasMany::class) {
            $this->try(Str::camel(Str::plural(class_basename($this->related)))); // @phpstan-ignore-line
            $this->try(Str::snake(Str::plural(class_basename($this->related)))); // @phpstan-ignore-line
        }

        if ($this->throwException && ($this->foundRelationshipName === '' || $this->foundRelationshipName === '0')) {
            $triedNames = implode(' / ', array_unique($this->triedRelationshipNames));
            throw new ExpectationFailedException(sprintf('Failed to assert that [%s] has relationship [%s]', $this->model::class, $triedNames)); // @phpstan-ignore-line
        }

        return $this->foundRelationshipName;
    }

    private function try(string $relationshipName): void
    {
        if ($relationshipName === '' || $relationshipName === '0') {
            return;
        }

        if ($this->foundRelationshipName !== '' && $this->foundRelationshipName !== '0') {
            return;
        }

        $this->triedRelationshipNames[] = $relationshipName;

        /* @phpstan-ignore-next-line */
        if (method_exists($this->model, $relationshipName)) {
            $this->validateRelationship($relationshipName);
            $this->foundRelationshipName = $relationshipName;
        }
    }

    private function validateRelationship(string $relationshipName): void
    {
        if (! $this->model->{$relationshipName}() instanceof $this->relationshipClass) {
            throw new ExpectationFailedException(sprintf('Failed to assert that [%s] has relationship [%s] of type [%s]', $this->model::class, $relationshipName, $this->relationshipClass)); // @phpstan-ignore-line
        }
    }

    public function getRelationship(): HasOne|HasMany|BelongsTo
    {
        return $this->model->{$this->foundRelationshipName}();
    }
}
