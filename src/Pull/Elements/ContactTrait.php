<?php

namespace Wearesho\Bobra\Ubki\Pull\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Trait ContactTrait
 * @package Wearesho\Bobra\Ubki\Pull\Elements
 */
trait ContactTrait
{
    /** @var Ubki\Dictionaries\ContactType */
    protected $type;

    /** @var string */
    protected $value;

    public function getValue(): string
    {
        return $this->value;
    }

    public function getType(): Ubki\Dictionaries\ContactType
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
