<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki\Infrastructure;
use Wearesho\Bobra\Ubki\Data;

/**
 * Class Person
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
abstract class Person extends Infrastructure\Element implements Data\Interfaces\Person
{
    use Data\Traits\Person;

    public function __construct(string $name)
    {
        $this->name = $name;

        parent::__construct();
    }
}
