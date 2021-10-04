<?php /** @noinspection PhpUndefinedMethodInspection */

use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\User;
use function Pest\Laravel\actingAs;

test('pass', function(){
    $user = User::make([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    actingAs($user);

    expect($user)->toBeAuthenticated();
});

test('failure with guest', function(){
    $user = User::make([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    expect($user)->toBeAuthenticated();
})->throws(ExpectationFailedException::class, "The user is not authenticated");

test('failure with wrong user', function(){
    $user1 = User::make([
        'id'     => 1,
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    $user2 = User::make([
        'id'     => 2,
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    actingAs($user1);

    expect($user2)->toBeAuthenticated();
})->throws(ExpectationFailedException::class, "The User ID #2 doesn't match authenticated User ID #1");

test('negated pass with guest', function(){
    $user = User::make([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    expect($user)->not->toBeAuthenticated();
});

test('negated pass with wrong user', function(){
    $user1 = User::make([
        'id'     => 1,
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    $user2 = User::make([
        'id'     => 2,
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    actingAs($user1);

    expect($user2)->not->toBeAuthenticated();
});

test('negated failure', function(){
    $user = User::make([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    actingAs($user);

    expect($user)->not->toBeAuthenticated();
})->throws(ExpectationFailedException::class, "Expecting Tests\Models\User Object (...) not to be authenticated");
