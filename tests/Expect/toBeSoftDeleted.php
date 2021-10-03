<?php

use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\SoftDeletableUser;

test('pass', function () {
    $user = SoftDeletableUser::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    $user->delete();

    expect($user)->toBeSoftDeleted();
});

test('failures', function () {
    $user = SoftDeletableUser::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    expect($user)->toBeSoftDeleted();
})->throws(ExpectationFailedException::class);

test('not failures', function () {
    $user = SoftDeletableUser::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    $user->delete();

    expect($user)->not->toBeSoftDeleted();
})->throws(ExpectationFailedException::class);
