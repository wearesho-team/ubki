<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data;

/**
 * Trait Makeable
 * @package Wearesho\Bobra\Ubki\Data
 */
trait Makeable
{
    public static function make(): object
    {
        return new static(...\func_get_args());
    }
}
