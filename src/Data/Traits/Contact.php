<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki\Dictionaries\ContactType;
use Wearesho\Bobra\Ubki\Data\Interfaces;

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

    /** @var ContactType */
    protected $type;

    /** @var string|null */
    protected $inn;

    public function jsonSerialize(): array
    {
        return [
            Interfaces\Contact::CREATED_AT => $this->createdAt,
            Interfaces\Contact::VALUE => $this->value,
            Interfaces\Contact::TYPE => $this->type,
            Interfaces\Contact::INN => $this->inn
        ];
    }

    public function tag(): string
    {
        return Interfaces\Contact::TAG;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getType(): ContactType
    {
        return $this->type;
    }

    public function getInn(): ?string
    {
        return $this->inn;
    }
}
