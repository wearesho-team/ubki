<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Interface Person
 * @package Wearesho\Bobra\Ubki\Data\Interfaces
 */
interface Person
{
    public const TAG = 'ident';

    public function getName(): string;
}
