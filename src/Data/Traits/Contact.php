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

    /** @var Ubki\Dictionary\ContactType */
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

    public function getType(): Ubki\Dictionary\ContactType
    {
        return $this->type;
    }

    public function getInn(): ?string
    {
        return $this->inn;
    }

    public function associativeAttributes(): array
    {
        return [
            Ubki\Data\Interfaces\Contact::CREATED_AT => $this->getCreatedAt(),
            Ubki\Data\Interfaces\Contact::INN => $this->getInn(),
            Ubki\Data\Interfaces\Contact::TYPE => $this->getType(),
            Ubki\Data\Interfaces\Contact::VALUE => $this->getValue(),
        ];
    }
}
