<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Contract;

/**
 * Class Work
 * @package Wearesho\Bobra\Ubki\Data\Collection
 */
class Work extends BaseCollection
{
    final public function type(): string
    {
        return Contract\Data\Work::class;
    }
}
