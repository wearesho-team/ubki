<?php

namespace Wearesho\Bobra\Ubki;

/**
 * Class Component
 * <comp> tag
 * @package Wearesho\Bobra\Ubki
 */
abstract class BaseComponent
{
    public const TAG = 'comp';
    public const ATTR_ID = 'id';

    public const IDENTIFYING = 1;

    abstract public function type(): int;
}
