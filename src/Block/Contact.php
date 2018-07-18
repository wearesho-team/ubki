<?php

namespace Wearesho\Bobra\Ubki\Block;

use Wearesho\Bobra\Ubki\Block;

/**
 * Class Contact
 * Data of one subject's contact
 * @package Wearesho\Bobra\Ubki\Block
 */
class Contact extends Block
{
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

    /** @var int|null */
    protected $inn;

    public function __construct(
        \DateTimeInterface $createdAt,
        string $value,
        int $type,
        ?int $inn = null
    ) {
        $this->createdAt = $createdAt;
        $this->value = $value;
        $this->type = $type;
        $this->inn = $inn;
    }

    public function tag(): string
    {
        return 'cont';
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

    public function getInn(): ?int
    {
        return $this->inn;
    }
}
