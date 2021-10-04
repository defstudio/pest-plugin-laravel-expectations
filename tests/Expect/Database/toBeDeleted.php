<?php

use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\User;

test('pass', function () {
    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    $user->delete();

    expect($user)->toBeDeleted();
});

test('failure', function () {
    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    expect($user)->toBeDeleted();
})->throws(ExpectationFailedException::class);

test('negated pas', function () {
    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    expect($user)->not->toBeDeleted();
});

test('negated failure', function () {
    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    $user->delete();

    expect($user)->not->toBeDeleted();
})->throws(ExpectationFailedException::class);
