<?php

use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\Comment;
use Tests\Models\Post;
use Tests\Models\User;

test('pass', function () {
    $user = User::create([
        'name' => 'test user',
        'email' => 'email@test.xx',
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
        'body' => 'bar',
    ]);

    $post->posted_comments()->save($comment);

    expect($comment)->toBelongTo($post, 'related_post');
});

test('fail without needed custom relationship', function () {
    $post = Post::create([
        'title' => 'foo',
    ]);

    $comment = Comment::make([
        'header' => 'foo',
        'body' => 'bar',
    ]);

    $post->posted_comments()->save($comment);

    expect($comment)->toBelongTo($post);
})->throws(ExpectationFailedException::class, "Failed to assert that [Tests\Models\Comment] has relationship [post]");

test('fail without association', function () {
    $user = User::create([
        'name' => 'test user',
        'email' => 'email@test.xx',
        'password' => 'password',
    ]);

    $post = Post::create([
        'title' => 'foo',
    ]);

    expect($post)->toBelongTo($user);
})->throws(ExpectationFailedException::class, "Failed asserting that [Tests\Models\Post#1] belongs to [Tests\Models\User#1]");

test('fail when passing wrong model ', function () {
    $user = User::create([
        'name' => 'test user',
        'email' => 'email@test.xx',
        'password' => 'password',
    ]);

    $firstPost = Post::create([
        'title' => 'foo',
    ]);

    $secondPost = $post = Post::create([
        'title' => 'foo',
    ]);

    $user->posts()->save($secondPost);

    expect($firstPost)->toBelongTo($user);
})->throws(ExpectationFailedException::class, "Failed asserting that [Tests\Models\Post#1] belongs to [Tests\Models\User#1]");

test('fail when passing wrong model class', function () {
    $user = User::create([
        'name' => 'test user',
        'email' => 'email@test.xx',
        'password' => 'password',
    ]);

    $post = Post::create([
        'title' => 'foo',
    ]);

    $comment = Comment::make([
        'header' => 'foo',
        'body' => 'bar',
    ]);

    $post->posted_comments()->save($comment);

    expect($comment)->toBelongTo($user, 'related_post');
})->throws(ExpectationFailedException::class, "Failed asserting that [Tests\Models\Comment#1] belongs to [Tests\Models\User#1] through its relationship 'related_post'");
