<?php

namespace Tests\Models;

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
}
