<?php

namespace Tests\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static User create(array $array)
 * @method static User make(array $array)
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

    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }
}
