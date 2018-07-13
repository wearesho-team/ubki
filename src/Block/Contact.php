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
     * Contact constructor.
     *
     * @param string             $value
     * @param int                $type
     * @param \DateTimeInterface $date
     */
    public function __construct(
        string $value,
        int $type,
        \DateTimeInterface $date
    ) {
        $this->value = $value;
        $this->type = $type;
        $this->createdAt = $date;
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
}
