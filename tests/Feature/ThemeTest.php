<?php

use TailwindClassMerge\TailwindClassMerge;

test('theme scale can be extended', function () {
    //    const TailwindClassMerge = extendTailwindClassMerge({
    //        theme: {
    //        spacing: ['my-space'],
    //            margin: ['my-margin'],
    //        },
    //    })

    expect(TailwindClassMerge::instance()->merge('p-3 p-my-space p-my-margin'))->toBe('p-my-space p-my-margin');
    expect(TailwindClassMerge::instance()->merge('m-3 m-my-space m-my-margin'))->toBe('m-my-margin');
})->todo();

test('theme object can be extended', function () {
    //    const TailwindClassMerge = extendTailwindClassMerge({
    //        theme: {
    //        'my-theme': ['hallo', 'hello'],
    //        },
    //        classGroups: {
    //        px: [{ px: [fromTheme('my-theme')] }],
    //        },
    //    })

    expect(TailwindClassMerge::instance()->merge('p-3 p-hello p-hallo'))->toBe('p-3 p-hello p-hallo');
    expect(TailwindClassMerge::instance()->merge('px-3 px-hello px-hallo'))->toBe('px-hallo');
})->todo();
