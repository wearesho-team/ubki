<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Contract;

/**
 * Class CourtDecision
 * @package Wearesho\Bobra\Ubki\Data\Collection
 */
class CourtDecision extends BaseCollection
{
    final public function type(): string
    {
        return Contract\Data\CourtDecision::class;
    }
}
