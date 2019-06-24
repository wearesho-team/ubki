<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Contract;

/**
 * Class CreditRequest
 * @package Wearesho\Bobra\Ubki\Data\Collection
 */
class CreditRequest extends BaseCollection
{
    final public function type(): string
    {
        return Contract\Data\CreditRequest::class;
    }
}
