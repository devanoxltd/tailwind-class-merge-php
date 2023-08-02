<?php

namespace TailwindClassMerge\Validators;

/**
 * @internal
 */
class AnyValueValidator implements \TailwindClassMerge\Contracts\ValidatorContract
{
    public static function validate(string $value): bool
    {
        return true;
    }
}
