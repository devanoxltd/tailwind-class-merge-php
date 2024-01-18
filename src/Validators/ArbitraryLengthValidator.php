<?php

namespace TailwindClassMerge\Validators;

use Illuminate\Support\Str;
use TailwindClassMerge\Validators\Concerns\ValidatesArbitraryValue;

/**
 * @internal
 */
class ArbitraryLengthValidator implements \TailwindClassMerge\Contracts\ValidatorContract
{
    use ValidatesArbitraryValue;

    final public const LENGTH_UNIT_REGEX = '/\d+(%|px|r?em|[sdl]?v([hwib]|min|max)|pt|pc|in|cm|mm|cap|ch|ex|r?lh|cq(w|h|i|b|min|max))|\b(calc|min|max|clamp)\(.+\)|^0$/';

    public static function validate(string $value): bool
    {
        return self::getIsArbitraryValue($value, 'length', self::isLengthOnly(...));
    }

    private static function isLengthOnly(string $value): bool
    {
        return Str::isMatch(self::LENGTH_UNIT_REGEX, $value);
    }
}
