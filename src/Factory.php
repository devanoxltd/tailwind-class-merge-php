<?php

namespace TailwindClassMerge;

use Psr\SimpleCache\CacheInterface;
use TailwindClassMerge\Support\Config;

final class Factory
{
    /**
     * @var array<string, mixed>
     */
    private array $additionalConfiguration = [];

    private ?CacheInterface $cache = null;

    /**
     * Override the default configuration.
     *
     * @param  array<string, mixed>  $configuration
     */
    public function withConfiguration(array $configuration): self
    {
        $this->additionalConfiguration = $configuration;

        return $this;
    }

    public function withCache(CacheInterface $cache): self
    {
        $this->cache = $cache;

        return $this;
    }

    /**
     * Creates a new TailwindClassMerge instance.
     */
    public function make(): TailwindClassMerge
    {
        Config::setAdditionalConfig($this->additionalConfiguration);
        $config = Config::getMergedConfig();

        return new TailwindClassMerge($config, $this->cache);
    }
}
