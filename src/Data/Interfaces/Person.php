<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

use Wearesho\Bobra\Ubki\Infrastructure\ElementInterface;

/**
 * Interface Person
 * @package Wearesho\Bobra\Ubki\Data\Interfaces
 */
interface Person extends ElementInterface
{
    public function getName(): string;
}
