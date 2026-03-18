<?php

namespace TailwindClassMerge\Validators;

use TailwindClassMerge\Contracts\ValidatorContract;

/**
 * @internal
 */
class NumberValidator implements ValidatorContract
{
    public static function validate(string $value): bool
    {
        return is_numeric($value);
    }
}
