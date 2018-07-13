<?php

namespace Wearesho\Bobra\Ubki\Pull\Response;

/**
 * Class Contact
 *
 * @package Wearesho\Bobra\Ubki\Pull\Data
 */
class Contact
{
    /** @var string Value of contact*/
    protected $value;

    /** @var int Contact type */
    protected $type;

    /** @var string */
    protected $description;

    /** @var \DateTimeInterface Date created */
    protected $date;

    public function __construct(
        string $value,
        int $type,
        string $description,
        \DateTimeInterface $date
    ) {
        $this->value = $value;
        $this->type = $type;
        $this->description = $description;
        $this->date = $date;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }
}
