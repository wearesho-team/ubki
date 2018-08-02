<?php

namespace Wearesho\Bobra\Ubki\Data\Contact;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class Entity
 * Data of one subject's contact
 * @package Wearesho\Bobra\Ubki\Data\Contact
 */
class Entity extends Ubki\Element implements \JsonSerializable
{
    public const TAG = 'cont';

    // attributes
    public const VALUE = 'cval';
    public const TYPE = 'ctype';
    public const CREATED_AT = 'vdate';
    public const INN = 'inn';

    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var string */
    protected $value;

    /** @var Type */
    protected $type;

    /** @var string|null */
    protected $inn;

    public function __construct(
        \DateTimeInterface $createdAt,
        string $value,
        Type $type,
        ?string $inn = null
    ) {
        $this->createdAt = $createdAt;
        $this->value = $value;
        $this->type = $type;
        $this->inn = $inn;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getType(): Type
    {
        return $this->type;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getInn(): ?string
    {
        return $this->inn;
    }

    public function jsonSerialize(): array
    {
        return [
            'createdAt' => Carbon::instance($this->getCreatedAt())->toDateString(),
            'value' => $this->getValue(),
            'type' => (string)$this->getType(),
            'inn' => $this->getInn()
        ];
    }
}
