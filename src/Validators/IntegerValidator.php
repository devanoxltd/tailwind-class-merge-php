<?php

namespace TailwindClassMerge\Validators;

use TailwindClassMerge\Validators\Concerns\ValidatesArbitraryValue;

/**
 * @internal
 */
class IntegerValidator implements \TailwindClassMerge\Contracts\ValidatorContract
{
    use ValidatesArbitraryValue;

    public static function validate(string $value): bool
    {
        if (self::isIntegerOnly($value)) {
            return true;
        }

        return self::getIsArbitraryValue($value, 'number', self::isIntegerOnly(...));
    }

    private static function isIntegerOnly(string $value): bool
    {
        return (string) (int) $value === $value;
    }
}
