<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Trait Person
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait Person
{
    /** @var string */
    protected $name;

    public function getName(): string
    {
        return $this->name;
    }

    public function tag(): string
    {
        return Interfaces\Person::TAG;
    }
}
