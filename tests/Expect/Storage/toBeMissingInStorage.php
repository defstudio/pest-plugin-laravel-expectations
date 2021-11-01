<?php

use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect('testfile.txt')->toBeMissingInStorage();
});

test('pass with non default storage', function () {
    Storage::put('testfile.txt', 'foo');

    expect('testfile.txt')->toBeMissingInStorage('secondary');
});

test('fail', function () {
    Storage::put('testfile.txt', 'foo');

    expect('testfile.txt')->toBeMissingInStorage();
})->throws(ExpectationFailedException::class, "Failed asserting that testfile.txt is missing in 'default' storage");

test('fail with non default storage', function () {
    Storage::disk('secondary')->put('testfile.txt', 'foo');

    expect('testfile.txt')->toBeMissingInStorage('secondary');
})->throws(ExpectationFailedException::class, "Failed asserting that testfile.txt is missing in 'secondary' storage");

test('pass negated', function () {
    Storage::put('testfile.txt', 'foo');

    expect('testfile.txt')->not->toBeMissingInStorage();
});

test('pass negated with non default storage', function () {
    Storage::disk('secondary')->put('testfile.txt', 'foo');

    expect('testfile.txt')->not->toBeMissingInStorage('secondary');
});

test('fails negated', function () {
    expect('testfile.txt')->not->toBeMissingInStorage();
})->throws(ExpectationFailedException::class, "Expecting 'testfile.txt' not to be missing in storage");

test('fails negated non default storage', function () {
    expect('testfile.txt')->not->toBeMissingInStorage('secondary');
})->throws(ExpectationFailedException::class, "Expecting 'testfile.txt' not to be missing in storage 'secondary'");
