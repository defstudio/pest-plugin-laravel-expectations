<?php

namespace Tests\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(array $array)
 * @method static make(string[] $array)
 */
class User extends \Illuminate\Foundation\Auth\User
{
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
