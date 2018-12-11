<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki;

/**
 * Trait Contact
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait Contact
{
    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var string */
    protected $value;

    /** @var Ubki\Dictionaries\ContactType */
    protected $type;

    /** @var string|null */
    protected $inn;

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getType(): Ubki\Dictionaries\ContactType
    {
        return $this->type;
    }

    public function getInn(): ?string
    {
        return $this->inn;
    }
}
