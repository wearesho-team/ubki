<?php

namespace Wearesho\Bobra\Ubki\Pull\Element;

use Wearesho\Bobra\Ubki;

/**
 * Trait ContactTrait
 * @package Wearesho\Bobra\Ubki\Pull\Element
 */
trait ContactTrait
{
    /** @var Ubki\Dictionary\ContactType */
    protected $type;

    /** @var string */
    protected $value;

    public function getValue(): string
    {
        return $this->value;
    }

    public function getType(): Ubki\Dictionary\ContactType
    {
        return $this->type;
    }

    public function associativeAttributes(): array
    {
        return [
            ContactInterface::TYPE => $this->getType(),
            ContactInterface::VALUE => $this->getValue(),
        ];
    }
}
