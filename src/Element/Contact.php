<?php

namespace Wearesho\Bobra\Ubki\Element;

use Wearesho\Bobra\Ubki;

/**
 * Class Contact
 * Data of one subject's contact
 * @package Wearesho\Bobra\Ubki\Element
 */
class Contact extends Ubki\Element
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

    /** @var int */
    protected $type;

    /** @var string|null */
    protected $inn;

    public function __construct(
        \DateTimeInterface $createdAt,
        string $value,
        int $type,
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

    public function getType(): int
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
}
