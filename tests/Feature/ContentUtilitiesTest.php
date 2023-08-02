<?php

use TailwindClassMerge\TailwindClassMerge;

test('merges content utilities correctly', function () {
    expect(TailwindClassMerge::instance()->merge("content-['hello'] content-[attr(data-content)]"))->toBe(
        'content-[attr(data-content)]',
    );
});
