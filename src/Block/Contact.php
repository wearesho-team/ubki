<?php

namespace Wearesho\Bobra\Ubki\Block;

/**
 * Class Contact
 * Data of one subject's contact
 * <cont> tag
 * @package Wearesho\Bobra\Ubki\Block
 */
class Contact
{
    public const TAG = 'cont';

    public const VALUE = 'cval';
    public const TYPE = 'ctype';
    public const CREATED_AT = 'vdate';
    public const INN = 'inn';

    /**
     * Created date of this contact
     * vdate attribute (required)
     * @var \DateTimeInterface
     */
    protected $createdAt;

    /**
     * Value of contact
     * cval attribute (required)
     * @var string
     */
    protected $value;

    /**
     * Type of contact
     * ctype attribute (required)
     * @var int
     */
    protected $type;

    /**
     * inn attribute
     * @var int|null
     */
    protected $inn;

    /**
     * Contact constructor.
     *
     * @param \DateTimeInterface $createdAt
     * @param string             $value
     * @param int       $type
     * @param int|null           $inn
     */
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
