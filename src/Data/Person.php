<?php

namespace Wearesho\Bobra\Ubki\Data;

/**
 * Class Person
 * @package Wearesho\Bobra\Ubki\Data
 */
abstract class Person
{
    public const TAG = 'ident';

    /** @var string */
    protected $name;

    public function getName(): string
    {
        return $this->name;
    }

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
