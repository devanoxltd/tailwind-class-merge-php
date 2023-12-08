<?php

namespace TailwindClassMerge\Validators;

use Illuminate\Support\Str;
use TailwindClassMerge\Validators\Concerns\ValidatesArbitraryValue;

/**
 * @internal
 */
class ArbitraryImageValidator implements \TailwindClassMerge\Contracts\ValidatorContract
{
    use ValidatesArbitraryValue;

    final const IMAGE_REGEX = '/^(url|image|image-set|cross-fade|element|(repeating-)?(linear|radial|conic)-gradient)\(.+\)$/';

    public static function validate(string $value): bool
    {
        return self::getIsArbitraryValue($value, ['image', 'url'], self::isImage(...));
    }

    private static function isImage(string $value): bool
    {
        return Str::isMatch(self::IMAGE_REGEX, $value);
    }
}
