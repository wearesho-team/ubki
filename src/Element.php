<?php

namespace Wearesho\Bobra\Ubki;

/**
 * Class Element
 * @package Wearesho\Bobra\Ubki
 * @deprecated
 * @see \Wearesho\Bobra\Ubki\Infrastructure\Element
 */
abstract class Element
{
    public const PARENT_TAG = null;
    public const TAG = null;

    final public function tag(): string
    {
        return static::TAG;
    }
}
