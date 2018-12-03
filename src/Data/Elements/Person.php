<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class Person
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
abstract class Person extends Ubki\Infrastructure\Element implements Ubki\Data\Interfaces\Person
{
    use Ubki\Data\Traits\Person;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
