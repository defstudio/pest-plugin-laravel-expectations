<?php

use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\Address;
use Tests\Models\Comment;
use Tests\Models\Post;
use Tests\Models\User;

test('[HasMany] pass', function () {
    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    $post = Post::make([
        'title' => 'foo',
    ]);

    $user->posts()->save($post);

    expect($user)->toHave($post);
});

test('[HasMany] pass with custom relationship', function () {
    $post = Post::create([
        'title' => 'foo',
    ]);

    $comment = Comment::make([
        'header' => 'foo',
        'body'   => 'bar',
    ]);

    $post->posted_comments()->save($comment);

    expect($post)->toHave($comment, 'posted_comments');
});

test('[HasMany] failure without needed custom relationship', function () {
    $post = Post::create([
        'title' => 'foo',
    ]);

    $comment = Comment::make([
        'header' => 'foo',
        'body'   => 'bar',
    ]);

    $post->posted_comments()->save($comment);

    expect($post)->toHave($comment);
})->throws(ExpectationFailedException::class, 'Failed to assert that [Tests\Models\Post] has relationship [comment / comments]');

test('[HasMany] failure without association', function () {
    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    $post = Post::create([
        'title' => 'foo',
    ]);

    expect($user)->toHave($post);
})->throws(ExpectationFailedException::class, "Failed asserting that [Tests\Models\User#1] has a relationship with [Tests\Models\Post#1]");

test('[HasMany] failure when passing wrong model ', function () {
    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    $post_1 = Post::create([
        'title' => 'foo',
    ]);

    $post_2 = Post::create([
        'title' => 'foo',
    ]);

    $user->posts()->save($post_1);

    expect($user)->toHave($post_2);
})->throws(ExpectationFailedException::class, "Failed asserting that [Tests\Models\User#1] has a relationship with [Tests\Models\Post#2]");

test('[HasMany] failure when passing wrong model class', function () {
    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    $post = Post::create([
        'title' => 'foo',
    ]);

    $comment = Comment::make([
        'header' => 'foo',
        'body'   => 'bar',
    ]);

    $post->posted_comments()->save($comment);

    expect($user)->toHave($comment, 'posts');
})->throws(ExpectationFailedException::class, "Failed asserting that [Tests\Models\User#1] has a relationship 'posts' with [Tests\Models\Comment#1]");

test('[HasOne] pass', function () {
    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    $address = Address::make([
        'address' => 'foo',
    ]);

    $user->address()->save($address);

    expect($user)->toHave($address);
});

test('[HasOne] failure without association', function () {
    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    $address = Address::create([
        'address' => 'foo',
    ]);

    expect($user)->toHave($address);
})->throws(ExpectationFailedException::class, "Failed asserting that [Tests\Models\User#1] has a relationship with [Tests\Models\Address#1]");

test('[HasOne] failure when passing wrong model ', function () {
    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    $address_1 = Address::create([
        'address' => 'foo',
    ]);

    $address_2 = Address::create([
        'address' => 'foo',
    ]);

    $user->address()->save($address_1);

    expect($user)->toHave($address_2);
})->throws(ExpectationFailedException::class, "Failed asserting that [Tests\Models\User#1] has a relationship with [Tests\Models\Address#2]");

test('[HasOne] failure when passing wrong model class', function () {
    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    $address = Address::create([
        'address' => 'foo',
    ]);

    $comment = Comment::create([
        'header' => 'foo',
        'body'   => 'bar',
    ]);

    $user->address()->save($address);

    expect($user)->toHave($comment, 'address');
})->throws(ExpectationFailedException::class, "Failed asserting that [Tests\Models\User#1] has a relationship 'address' with [Tests\Models\Comment#1]");
