<?php

namespace TailwindClassMerge\Support;

use Illuminate\Support\Collection;
use TailwindClassMerge\ValueObjects\ClassPartObject;
use TailwindClassMerge\ValueObjects\ClassValidatorObject;
use TailwindClassMerge\ValueObjects\ThemeGetter;

class ClassMap
{
    final public const CLASS_PART_SEPARATOR = '-';

    /**
     * @param  array{cacheSize: int, prefix: ?string, theme: array<string, mixed>, classGroups: array<string, mixed>,conflictingClassGroups: array<string, array<int, string>>, conflictingClassGroupModifiers: array<string, array<int, string>>}  $config
     */
    public static function create(array $config): ClassPartObject
    {
        $theme = $config['theme'];
        $prefix = $config['prefix'];

        $classMap = new ClassPartObject;

        $prefixedClassGroupEntries = self::getPrefixedClassGroupEntries(
            $config['classGroups'],
            $prefix,
        );

        foreach ($prefixedClassGroupEntries as $classGroupId => $classGroup) {
            self::processClassesRecursively($classGroup, $classMap, $classGroupId, $theme);
        }

        return $classMap;
    }

    /**
     * @param  array<string, mixed>  $classGroupEntries
     * @return array<string, mixed>
     */
    private static function getPrefixedClassGroupEntries(array $classGroupEntries, ?string $prefix): array
    {
        if (! $prefix) {
            return $classGroupEntries;
        }

        // @phpstan-ignore-next-line
        return Collection::make($classGroupEntries)->mapWithKeys(function (array $classGroup, string $classGroupId) use ($prefix): array {
            // @phpstan-ignore-next-line
            $prefixedClassGroup = Collection::make($classGroup)->map(function (string|array $classDefinition) use ($prefix): string|array {
                if (is_string($classDefinition)) {
                    return $prefix . $classDefinition;
                }

                // @phpstan-ignore-next-line
                if (is_array($classDefinition)) {
                    return Collection::make($classDefinition)
                        // @phpstan-ignore-next-line
                        ->mapWithKeys(fn (array $value, string $key): array => [$prefix . $key => $value])->all();
                }

                //                return $classDefinition;
            })->all();

            return [$classGroupId => $prefixedClassGroup];
        })->all();
    }

    public static function processClassesRecursively(array $classGroup, ClassPartObject $classPartObject, string $classGroupId, array $theme): void
    {
        foreach ($classGroup as $classDefinition) {
            if (is_string($classDefinition)) {
                $classPartObjectToEdit = $classDefinition === '' ? $classPartObject : self::getPart($classPartObject, $classDefinition);
                $classPartObjectToEdit->classGroupId = $classGroupId;

                continue;
            }

            // @phpstan-ignore-next-line
            if (self::isThemeGetter($classDefinition)) {
                self::processClassesRecursively(
                    // @phpstan-ignore-next-line
                    $classDefinition->get($theme),
                    $classPartObject,
                    $classGroupId,
                    $theme,
                );

                continue;
            }

            if (is_callable($classDefinition)) {
                $classPartObject->validators[] = new ClassValidatorObject(
                    classGroupId: $classGroupId,
                    validator: $classDefinition,
                );

                continue;
            }

            // @phpstan-ignore-next-line
            foreach ($classDefinition as $key => $classGroup) {
                self::processClassesRecursively(
                    // @phpstan-ignore-next-line
                    $classGroup,
                    // @phpstan-ignore-next-line
                    self::getPart($classPartObject, $key),
                    $classGroupId,
                    $theme,
                );
            }
        }
    }

    private static function isThemeGetter(ThemeGetter|array|callable $classDefinition): bool
    {
        return $classDefinition instanceof ThemeGetter;
    }

    private static function getPart(ClassPartObject $classPartObject, string $path): ClassPartObject
    {
        $currentClassPartObject = $classPartObject;

        foreach (explode(self::CLASS_PART_SEPARATOR, $path) as $pathPart) {
            if (! isset($currentClassPartObject->nextPart[$pathPart])) {
                $currentClassPartObject->nextPart[$pathPart] = new ClassPartObject;
            }

            $currentClassPartObject = $currentClassPartObject->nextPart[$pathPart];
        }

        return $currentClassPartObject;
    }
}
