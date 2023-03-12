<?php

use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\SoftDeletableUser;

test('pass', function () {
    $user = SoftDeletableUser::create([
        'name' => 'test user',
        'email' => 'email@test.xx',
        'password' => 'password',
    ]);

    $user->delete();

    expect($user)->toBeSoftDeleted();
});

test('fail', function () {
    $user = SoftDeletableUser::create([
        'name' => 'test user',
        'email' => 'email@test.xx',
        'password' => 'password',
    ]);

    expect($user)->toBeSoftDeleted();
})->throws(ExpectationFailedException::class);

test('negated pass', function () {
    $user = SoftDeletableUser::create([
        'name' => 'test user',
        'email' => 'email@test.xx',
        'password' => 'password',
    ]);

    expect($user)->not->toBeSoftDeleted();
});

test('negated fail', function () {
    $user = SoftDeletableUser::create([
        'name' => 'test user',
        'email' => 'email@test.xx',
        'password' => 'password',
    ]);

    $user->delete();

    expect($user)->not->toBeSoftDeleted();
})->throws(ExpectationFailedException::class);
