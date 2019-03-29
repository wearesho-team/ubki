<?php

namespace Wearesho\Bobra\Ubki\Data\Element;

use Wearesho\Bobra\Ubki;

/**
 * Class Person
 * @package Wearesho\Bobra\Ubki\Data\Element
 */
abstract class Person extends Ubki\Infrastructure\Element implements Ubki\Data\Interfaces\Person
{
    use Ubki\Data\Traits\Person;

    public const TAG = 'ident';

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
