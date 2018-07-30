<?php

namespace Wearesho\Bobra\Ubki;

/**
 * Class Element
 * @package Wearesho\Bobra\Ubki
 */
abstract class Element
{
    public const PARENT_TAG = null;
    public const TAG = null;

    public function tag(): string
    {
        return static::TAG;
    }
}
