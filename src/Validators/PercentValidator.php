<?php

namespace TailwindClassMerge\Validators;

use Illuminate\Support\Str;
use TailwindClassMerge\Contracts\ValidatorContract;

/**
 * @internal
 */
class PercentValidator implements ValidatorContract
{
    public static function validate(string $value): bool
    {
        if (! Str::endsWith($value, '%')) {
            return false;
        }

        return NumberValidator::validate(Str::of($value)->substr(0, -1)->toString());
    }
}
