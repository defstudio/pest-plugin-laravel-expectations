<?php

test('at character in toBe expectation', function () {
    expect('@pussyCat')->not->toBe('@littleDog');
});
