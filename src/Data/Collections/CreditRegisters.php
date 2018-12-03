<?php

namespace Wearesho\Bobra\Ubki\Data\Collections;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class CreditRegisters
 * @package Wearesho\Bobra\Ubki\Data\Collections
 */
class CreditRegisters extends BaseCollection
{
    public function type(): string
    {
        return Interfaces\CreditRegister::class;
    }
}
