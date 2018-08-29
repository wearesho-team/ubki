<?php

namespace Wearesho\Bobra\Ubki\Blocks\Entities;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\References\ContactType;

/**
 * Class Contact
 * @package Wearesho\Bobra\Ubki\Blocks\Entities
 */
class Contact
{
    public const TAG = 'cont';
    public const VALUE = 'cval';
    public const TYPE = 'ctype';
    public const TYPE_REF = 'typeref';
    public const CREATED_AT = 'vdate';
    public const INN = 'inn';

    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var string */
    protected $value;

    /** @var ContactType */
    protected $type;

    /** @var string|null */
    protected $inn;

    public function __construct(
        \DateTimeInterface $createdAt,
        string $value,
        ContactType $type,
        ?string $inn = null
    ) {
        $this->createdAt = $createdAt;
        $this->value = $value;
        $this->type = $type;
        $this->inn = $inn;
    }

    public function jsonSerialize(): array
    {
        return [
            'createdAt' => Carbon::instance($this->createdAt)->toDateString(),
            'value' => $this->value,
            'type' => $this->type->__toString(),
            'inn' => $this->inn
        ];
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
