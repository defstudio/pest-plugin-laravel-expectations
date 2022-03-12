<?php

/** @noinspection SqlResolve */

/* @noinspection SqlNoDataSourceInspection */

use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\User;

test('pass', function () {
    $query = User::query()
        ->where('name', 'foo')
        ->where('email', 'bar');

    expect($query)->toMatchQuery(
        'select * from "users" where "name" = ? and "email" = ?',
        ['foo', 'bar'],
    );
});

test("fail if query doesn't match", function () {
    $query = User::query()
        ->where('name', 'foo')
        ->where('email', 'bar')
        ->where('id', 42);

    expect($query)->toMatchQuery(
        'select * from "users" where "name" = ? and "email" = ?',
        ['foo', 'bar'],
    );
})->throws(ExpectationFailedException::class);

test("fail if bindings don't match", function () {
    $query = User::query()
        ->where('name', 'foo')
        ->where('email', 'baz');

    expect($query)->toMatchQuery(
        'select * from "users" where "name" = ? and "email" = ?',
        ['foo', 'bar'],
    );
})->throws(ExpectationFailedException::class);

test('negated pass', function () {
    $query = User::query()
        ->where('name', 'foo')
        ->where('email', 'bar')
        ->where('id', 42);

    expect($query)->not->toMatchQuery(
        'select * from "users" where "name" = ? and "email" = ?',
        ['foo', 'bar'],
    );
});

test('negated fail', function () {
    $query = User::query()
        ->where('name', 'foo')
        ->where('email', 'bar');

    expect($query)->not->toMatchQuery(
        'select * from "users" where "name" = ? and "email" = ?',
        ['foo', 'bar'],
    );
})->throws(ExpectationFailedException::class);

test('partial pass', function () {
    $query = User::query()
        ->where('name', 'foo')
        ->where('email', 'bar')
        ->where('id', 42);

    expect($query)->toMatchQuery(
        'and "email" = ?',
        ['bar'],
        false,
    );
});

test('partial pass even if full covers', function () {
    $query = User::query()
        ->where('name', 'foo')
        ->where('email', 'bar')
        ->where('id', 42);

    expect($query)->toMatchQuery(
        'select * from "users" where "name" = ? and "email" = ? and "id" = ?',
        ['foo', 'bar', 42],
        false,
    );
});

test("partial fail if query doesn't match", function () {
    $query = User::query()
        ->where('name', 'foo')
        ->where('email', 'bar')
        ->where('id', 42);

    expect($query)->toMatchQuery(
        'where "email" = ?',
        ['bar'],
        false,
    );
})->throws(ExpectationFailedException::class);

test("partial fail if bindings don't match", function () {
    $query = User::query()
        ->where('name', 'foo')
        ->where('email', 'bar')
        ->where('id', 42);

    expect($query)->toMatchQuery(
        'and "email" = ?',
        ['baz'],
        false,
    );
})->throws(ExpectationFailedException::class);

test('partial negated pass', function () {
    $query = User::query()
        ->where('name', 'foo')
        ->where('email', 'bar')
        ->where('id', 42);

    expect($query)->not->toMatchQuery(
        'where "email" = ?',
        ['baz'],
        false,
    );
});

test('partial negated fail', function () {
    $query = User::query()
        ->where('name', 'foo')
        ->where('email', 'bar')
        ->where('id', 42);

    expect($query)->not->toMatchQuery(
        'and "email" = ?',
        ['bar'],
        false,
    );
})->throws(ExpectationFailedException::class);
