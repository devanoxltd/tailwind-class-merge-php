<?php

namespace TailwindClassMerge\Validators;

use TailwindClassMerge\Contracts\ValidatorContract;
use TailwindClassMerge\Validators\Concerns\ValidatesArbitraryValue;

/**
 * @internal
 */
class ArbitrarySizeValidator implements ValidatorContract
{
    use ValidatesArbitraryValue;

    public static function validate(string $value): bool
    {
        return self::getIsArbitraryValue($value, ['length', 'size', 'percentage'], fn (): bool => false);
    }
}
