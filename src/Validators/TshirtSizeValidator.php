<?php

namespace TailwindClassMerge\Validators;

use Illuminate\Support\Str;

/**
 * @internal
 */
class TshirtSizeValidator implements \TailwindClassMerge\Contracts\ValidatorContract
{
    const T_SHIRT_UNIT_REGEX = '/^(\d+(\.\d+)?)?(xs|sm|md|lg|xl)$/';

    public static function validate(string $value): bool
    {
        return Str::isMatch(self::T_SHIRT_UNIT_REGEX, $value);
    }
}
