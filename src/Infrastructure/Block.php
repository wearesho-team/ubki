<?php

namespace Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Interface Block
 * @package Wearesho\Bobra\Ubki\Infrastructure
 */
abstract class Block extends Element implements BlockInterface
{
    public const ID = null;

    public function getId(): int
    {
        return static::ID;
    }

    public function tag(): string
    {
        return static::TAG;
    }
}
