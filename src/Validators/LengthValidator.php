<?php

namespace TailwindClassMerge\Validators;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

/**
 * @internal
 */
class LengthValidator implements \TailwindClassMerge\Contracts\ValidatorContract
{
    final public const FRACTION_REGEX = '/^\d+\/\d+$/';

    public static function validate(string $value): bool
    {
        if (NumberValidator::validate($value)) {
            return true;
        }

        if (self::stringLengths()->contains($value)) {
            return true;
        }

        return Str::isMatch(self::FRACTION_REGEX, $value);
    }

    /**
     * @return Collection<int, string>
     */
    private static function stringLengths(): Collection
    {
        return Collection::make(['px', 'full', 'screen']);
    }
}
