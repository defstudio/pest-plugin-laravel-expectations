<?php

use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\User;

test('pass', function () {
    User::create([
        'name' => 'test user',
        'email' => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    expect([
        'email' => 'email@test.xx',
        'password' => 'password',
    ])->toBeValidCredentials();
});

test('fail', function () {
    expect([
        'email' => 'wrong-email@test.xx',
        'password' => 'passwords',
    ])->toBeValidCredentials();
})->throws(ExpectationFailedException::class, 'The given credentials are invalid');

test('negated pass', function () {
    expect([
        'email' => 'wrong-email@test.xx',
        'password' => 'passwords',
    ])->not->toBeValidCredentials();
});

test('negated fail', function () {
    User::create([
        'name' => 'test user',
        'email' => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    expect([
        'email' => 'email@test.xx',
        'password' => 'password',
    ])->not->toBeValidCredentials();
})->throws(ExpectationFailedException::class, 'Expecting Array (…) not to be valid credentials');
