<?php

use TailwindClassMerge\TailwindClassMerge;

it('merges non-conflicting classes correctly', function (string $input, string $output) {
    expect(TailwindClassMerge::instance()->merge($input))
        ->toBe($output);
})->with([
    ['border-t border-white/10', 'border-t border-white/10'],
    ['border-t border-white', 'border-t border-white'],
    ['text-3.5xl text-black', 'text-3.5xl text-black'],
]);
