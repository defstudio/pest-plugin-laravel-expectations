<?php

use Illuminate\Database\Eloquent\RelationNotFoundException;
use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\Comment;
use Tests\Models\Post;
use Tests\Models\User;

test('pass', function () {
    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    $post = Post::make([
        'title' => 'foo',
    ]);

    $user->posts()->save($post);

    expect($post)->toBelongTo($user);
});

test('pass with custom relationship', function () {
    $post = Post::create([
        'title' => 'foo',
    ]);

    $comment = Comment::make([
        'header' => 'foo',
        'body'   => 'bar',
    ]);

    $post->comments()->save($comment);

    expect($comment)->toBelongTo($post, 'related_post');
});

test('failure without needed custom relationship', function () {
    $post = Post::create([
        'title' => 'foo',
    ]);

    $comment = Comment::make([
        'header' => 'foo',
        'body'   => 'bar',
    ]);

    $post->comments()->save($comment);

    expect($comment)->toBelongTo($post);
})->throws(RelationNotFoundException::class);

test('failure without association', function () {
    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    $post = Post::create([
        'title' => 'foo',
    ]);

    expect($post)->toBelongTo($user);
})->throws(ExpectationFailedException::class, "Failed asserting that the model Tests\Models\Post#1 belongs to the model Tests\Models\User#1");

test('failure when passing wrong model ', function () {
    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => 'password',
    ]);

    Post::create([
        'title' => 'foo',
    ]);

    $post = Post::create([
        'title' => 'foo',
    ]);

    expect($post)->toBelongTo($user);
})->throws(ExpectationFailedException::class, "Failed asserting that the model Tests\Models\Post#2 belongs to the model Tests\Models\User#1");

test('failure when passing wrong model class', function () {
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

    $post->comments()->save($comment);

    expect($comment)->toBelongTo($user, 'related_post');
})->throws(ExpectationFailedException::class, "Failed asserting that the model Tests\Models\Comment#1 belongs to the model Tests\Models\User#1 through its relationship related_post");
