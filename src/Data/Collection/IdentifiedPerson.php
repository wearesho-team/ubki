<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Contract;

/**
 * Class IdentifiedPerson
 * @package Wearesho\Bobra\Ubki\Data\Collection
 */
class IdentifiedPerson extends BaseCollection
{
    final public function type(): string
    {
        return Contract\Data\IdentifiedPerson::class;
    }

    /**
     * @return IdentifiedPerson
     */
    public function getNaturals(): IdentifiedPerson
    {
        return $this->map(function (Contract\Data\IdentifiedPerson $person): ?Contract\Data\IdentifiedPerson {
            return $person instanceof Contract\Data\NaturalPerson ? $person : \null;
        });
    }

    /**
     * @return IdentifiedPerson
     */
    public function getLegals(): IdentifiedPerson
    {
        return $this->map(function (Contract\Data\IdentifiedPerson $person): ?Contract\Data\IdentifiedPerson {
            return $person instanceof Contract\Data\LegalPerson ? $person : \null;
        });
    }

    protected function map(\Closure $callback): IdentifiedPerson
    {
        return new static(
            \array_filter(
                \array_map($callback, $this->getArrayCopy())
            )
        );
    }
}
