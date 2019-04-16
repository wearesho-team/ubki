<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Contract;

/**
 * Class Address
 * @package Wearesho\Bobra\Ubki\Data\Collection
 *
 * @method Contract\Data\Address offsetGet($index)
 */
class Address extends BaseCollection
{
    final public function type(): string
    {
        return Contract\Data\Address::class;
    }
}
