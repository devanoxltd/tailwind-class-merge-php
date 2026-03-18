<?php

namespace TailwindClassMerge\Validators;

use TailwindClassMerge\Contracts\ValidatorContract;

/**
 * @internal
 */
class AnyValueValidator implements ValidatorContract
{
    public static function validate(string $value): bool
    {
        return true;
    }
}
