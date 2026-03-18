<?php

namespace TailwindClassMerge\Validators;

use Illuminate\Support\Str;
use TailwindClassMerge\Contracts\ValidatorContract;

/**
 * @internal
 */
class ArbitraryValueValidator implements ValidatorContract
{
    final public const ARBITRARY_VALUE_REGEX = '/^\[(?:([a-z-]+):)?(.+)\]$/i';

    public static function validate(string $value): bool
    {
        return Str::isMatch(self::ARBITRARY_VALUE_REGEX, $value);
    }
}
