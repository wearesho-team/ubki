<?php

namespace Wearesho\Bobra\Ubki;

/**
 * Interface Block
 * @package Wearesho\Bobra\Ubki
 */
abstract class Block
{
    public const TAG = 'comp';
    public const ATTR_ID = 'id';

    public const ID = null;

    public function getId(): int
    {
        return static::ID;
    }
}
