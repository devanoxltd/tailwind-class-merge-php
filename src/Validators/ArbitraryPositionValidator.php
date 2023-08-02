<?php

namespace TailwindClassMerge\Validators;

use TailwindClassMerge\Validators\Concerns\ValidatesArbitraryValue;

/**
 * @internal
 */
class ArbitraryPositionValidator implements \TailwindClassMerge\Contracts\ValidatorContract
{
    use ValidatesArbitraryValue;

    public static function validate(string $value): bool
    {
        return self::getIsArbitraryValue($value, 'position', fn (): bool => false);
    }
}
