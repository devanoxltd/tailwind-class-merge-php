<?php

namespace TailwindClassMerge\Validators;

use Illuminate\Support\Str;
use TailwindClassMerge\Validators\Concerns\ValidatesArbitraryValue;

/**
 * @internal
 */
class ArbitraryUrlValidator implements \TailwindClassMerge\Contracts\ValidatorContract
{
    use ValidatesArbitraryValue;

    public static function validate(string $value): bool
    {
        return self::getIsArbitraryValue($value, 'url', self::isUrl(...));
    }

    private static function isUrl(string $value): bool
    {
        return Str::startsWith($value, 'url(');
    }
}
