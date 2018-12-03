<?php

namespace Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class Element
 * @package Wearesho\Bobra\Ubki\Infrastructure
 */
abstract class Element implements ElementInterface
{
    /**
     * Name of tag
     *
     * @return string
     */
    abstract public function tag(): string;

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
