<?php

namespace Wearesho\Bobra\Ubki\Data;

use Wearesho\Bobra\Ubki;

/**
 * Class Contact
 * @package Wearesho\Bobra\Ubki\Data
 */
class Contact extends Ubki\Element
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

    /** @var Ubki\Dictionary\Contact */
    protected $type;

    /** @var string|null */
    protected $inn;

    public function __construct(
        \DateTimeInterface $createdAt,
        string $value,
        Ubki\Dictionary\Contact $type,
        string $inn = null
    ) {
        $this->createdAt = $createdAt;
        $this->value = $value;
        $this->type = $type;
        $this->inn = $inn;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getType(): Ubki\Dictionary\Contact
    {
        return $this->type;
    }

    public function getInn(): ?string
    {
        return $this->inn;
    }
}
