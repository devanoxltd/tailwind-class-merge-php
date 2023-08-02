<?php

namespace TailwindClassMerge\Validators;

/**
 * @internal
 */
class NumberValidator implements \TailwindClassMerge\Contracts\ValidatorContract
{
    public static function validate(string $value): bool
    {
        return is_numeric($value);
    }
}
