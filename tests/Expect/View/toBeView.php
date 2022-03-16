<?php

use PHPUnit\Framework\ExpectationFailedException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

test('pass', function () {
   expect(view('index'))->toBeView('index');
});
