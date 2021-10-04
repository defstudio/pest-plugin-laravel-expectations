<?php

namespace Tests\Models;

class User extends \Illuminate\Foundation\Auth\User
{
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
    ];
}
