<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
   expect(view('index'))->toBeView('index');
});
