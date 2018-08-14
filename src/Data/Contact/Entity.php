<?php

namespace Wearesho\Bobra\Ubki\Data\Contact;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Element;

/**
 * Data of one subject's contact
 *
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\Contact
 *
 * @property-read \DateTimeInterface $createdAt
 * @property-read string             $value
 * @property-read Type               $type
 * @property-read string|null        inn
 */
class Entity extends Element implements \JsonSerializable
{
    public const TAG = 'cont';

    public const VALUE = 'cval';
    public const TYPE = 'ctype';
    public const TYPE_REF = 'typeref';
    public const CREATED_AT = 'vdate';
    public const INN = 'inn';

    public function __construct(
        \DateTimeInterface $createdAt,
        string $value,
        Type $type,
        ?string $inn = null
    ) {
        parent::__construct([
            'createdAt' => $createdAt,
            'value' => $value,
            'type' => $type,
            'inn' => $inn
        ]);
    }

    public function jsonSerialize(): array
    {
        return [
            'createdAt' => Carbon::instance($this->createdAt)->toDateString(),
            'value' => $this->value,
            'type' => (string)$this->type,
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

    public function getType(): Type
    {
        return $this->type;
    }

    public function getInn(): ?string
    {
        return $this->inn;
    }
}
