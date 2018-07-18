<?php

namespace Wearesho\Bobra\Ubki;

/**
 * Class Block
 * <comp> tag
 * @package Wearesho\Bobra\Ubki
 */
abstract class Block
{
    public const TAG = 'comp';
    public const ATTR_ID = 'id';

    /**
     * Block identification of physical / legal entity
     */
    public const IDENTIFYING = 1;

    abstract public function type(): int;
}
