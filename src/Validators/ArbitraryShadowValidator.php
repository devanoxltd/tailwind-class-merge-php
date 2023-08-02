<?php

namespace TailwindClassMerge\Validators;

use Illuminate\Support\Str;
use TailwindClassMerge\Validators\Concerns\ValidatesArbitraryValue;

/**
 * @internal
 */
class ArbitraryShadowValidator implements \TailwindClassMerge\Contracts\ValidatorContract
{
    use ValidatesArbitraryValue;

    const SHADOW_REGEX = '/^-?((\d+)?\.?(\d+)[a-z]+|0)_-?((\d+)?\.?(\d+)[a-z]+|0)/';

    public static function validate(string $value): bool
    {
        return self::getIsArbitraryValue($value, '', self::isShadow(...));
    }

    private static function isShadow(string $value): bool
    {
        return Str::isMatch(self::SHADOW_REGEX, $value);
    }
}
