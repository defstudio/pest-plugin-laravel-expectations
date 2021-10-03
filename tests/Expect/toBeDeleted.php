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

test('failures', function () {
    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    expect($user)->toBeDeleted();
})->throws(ExpectationFailedException::class);

test('not failures', function () {
    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    $user->delete();

    expect($user)->not->toBeDeleted();
})->throws(ExpectationFailedException::class);
