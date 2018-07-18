<?php

namespace Wearesho\Bobra\Ubki\Collection;

use Wearesho\Bobra\Ubki;

/**
 * Class LegalIdentification
 * @package Wearesho\Bobra\Ubki\Collection
 */
class LegalIdentification extends Ubki\BaseCollection
{
    public function type(): string
    {
        return Ubki\Block\LegalIdentification::class;
    }
}
