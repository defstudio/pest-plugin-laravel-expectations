<?php

test('pass', function () {
    expect(view('page'))->toBeView('page');
});
