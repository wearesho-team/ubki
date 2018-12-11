<?php

namespace Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class Element
 * @package Wearesho\Bobra\Ubki\Infrastructure
 */
abstract class Element implements ElementInterface
{
    public const TAG = null;

    /**
     * Name of tag
     *
     * @return string
     */
    public function tag(): string
    {
        return static::TAG;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
