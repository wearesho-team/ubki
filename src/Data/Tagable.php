<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data;

/**
 * Trait Tagable
 * @package Wearesho\Bobra\Ubki\Data
 */
trait Tagable
{
    abstract public static function tag(): string;
}
