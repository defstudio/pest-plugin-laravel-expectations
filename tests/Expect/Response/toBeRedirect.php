<?php

use function Pest\Laravel\get;

test('pass', function () {
    $response = get('/redirect');

    expect($response)->toBeRedirect('/login');
});
