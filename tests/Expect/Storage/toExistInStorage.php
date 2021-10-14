<?php

use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    Storage::put('testfile.txt', 'foo');

    expect('testfile.txt')->toExistInStorage();
});

test('pass with non default storage', function () {
    Storage::disk('secondary')->put('testfile.txt', 'foo');

    expect('testfile.txt')->toExistInStorage('secondary');
});

test('fail', function () {
    expect('testfile.txt')->toExistInStorage();
})->throws(ExpectationFailedException::class, "Failed asserting that testfile.txt exist in 'default' storage");

test('fail with non default storage', function () {
    Storage::put('testfile.txt', 'foo');
    expect('testfile.txt')->toExistInStorage('secondary');
})->throws(ExpectationFailedException::class, "Failed asserting that testfile.txt exist in 'secondary' storage");

test('pass negated', function () {
    expect('testfile.txt')->not->toExistInStorage();
});

test('pass negated with non default storage', function () {
    Storage::put('testfile.txt', 'foo');
    expect('testfile.txt')->not->toExistInStorage('secondary');
});

test('fails negated', function () {
    Storage::put('testfile.txt', 'foo');

    expect('testfile.txt')->toExistInStorage();

    expect('testfile.txt')->not->toExistInStorage();
})->throws(ExpectationFailedException::class, "Expecting 'testfile.txt' not to exist in storage");

test('fails negated non default storage', function () {
    Storage::disk('secondary')->put('testfile.txt', 'foo');

    expect('testfile.txt')->not->toExistInStorage('secondary');
})->throws(ExpectationFailedException::class, "Expecting 'testfile.txt' not to exist in storage 'secondary'");
