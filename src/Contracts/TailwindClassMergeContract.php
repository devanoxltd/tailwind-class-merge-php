<?php

namespace TailwindClassMerge\Contracts;

interface TailwindClassMergeContract
{
    /**
     * @param  array<array-key, string|array<array-key, string>>  ...$args
     */
    public function merge(...$args): string;
}
