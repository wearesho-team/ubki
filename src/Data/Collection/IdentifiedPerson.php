<?php

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data;

/**
 * Class IdentifiedPerson
 * @package Wearesho\Bobra\Ubki\Data\Collection
 */
class IdentifiedPerson extends BaseCollection
{
    public function type(): string
    {
        return Data\IdentifiedPerson::class;
    }

    /**
     * @return IdentifiedPerson
     */
    public function getNaturals(): IdentifiedPerson
    {
        return $this->map(function (Data\IdentifiedPerson $person): ?Data\IdentifiedPerson {
            return $person instanceof Data\NaturalPerson ? $person : null;
        });
    }

    /**
     * @return IdentifiedPerson
     */
    public function getLegals(): IdentifiedPerson
    {
        return $this->map(function (Data\IdentifiedPerson $person): ?Data\IdentifiedPerson {
            return $person instanceof Data\LegalPerson ? $person : null;
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
