<?php

namespace TailwindClassMerge\Validators;

use TailwindClassMerge\Contracts\ValidatorContract;
use TailwindClassMerge\Validators\Concerns\ValidatesArbitraryValue;

/**
 * @internal
 */
class ArbitraryPositionValidator implements ValidatorContract
{
    use ValidatesArbitraryValue;

    public static function validate(string $value): bool
    {
        return self::getIsArbitraryValue($value, 'position', fn (): bool => false);
    }
}
