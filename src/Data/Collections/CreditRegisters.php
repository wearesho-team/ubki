<?php

namespace Wearesho\Bobra\Ubki\Data\Collections;

use Wearesho\Bobra\Ubki\Infrastructure;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class CreditRegisters
 * @package Wearesho\Bobra\Ubki\Data\Collections
 */
class CreditRegisters extends Infrastructure\BaseCollection
{
    public function type(): string
    {
        return Interfaces\CreditRegister::class;
    }
}
