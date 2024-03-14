<?php

use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\User;

test('pass', function () {
    expect([
        'email' => 'email@test.xx',
        'password' => 'password',
    ])->toBeInvalidCredentials();
});

test('fail', function () {
    User::create([
        'name' => 'test user',
        'email' => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    expect([
        'email' => 'email@test.xx',
        'password' => 'password',
    ])->toBeInvalidCredentials();
})->throws(ExpectationFailedException::class, 'The given credentials are valid');

test('negated pass', function () {
    User::create([
        'name' => 'test user',
        'email' => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    expect([
        'email' => 'email@test.xx',
        'password' => 'password',
    ])->not->toBeInvalidCredentials();
});

test('negated fail', function () {
    expect([
        'email' => 'email@test.xx',
        'password' => 'password',
    ])->not->toBeInvalidCredentials();
})->throws(ExpectationFailedException::class, 'not to be invalid credentials');
