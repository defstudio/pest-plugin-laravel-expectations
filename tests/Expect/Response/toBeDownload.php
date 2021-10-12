<?php

use function Pest\Laravel\get;
use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(get('/download/test'))->toBeDownload();
});

test('pass with filename', function () {
    expect(get('/download/test.txt'))->toBeDownload('test.txt');
});

test('failure', function () {
    expect(get('/ok'))->toBeDownload();
})->throws(ExpectationFailedException::class, 'Response does not offer a file download');

test('filename failure', function () {
    expect(get('/download/test.txt'))->toBeDownload('foo.bin');
})->throws(ExpectationFailedException::class, 'Expected file [foo.bin] is not present in Content-Disposition header');

test('pass negated', function () {
    expect(get('/ok'))->not->toBeDownload();
});

test('filename pass negated', function () {
    expect(get('/download/test.txt'))->not->toBeDownload('foo.bin');
});

test('negated failure', function () {
    expect(get('/download/test'))->not->toBeDownload();
})->throws(ExpectationFailedException::class, "Expecting Illuminate\Testing\TestResponse Object (...) not to be download");
