<?php

namespace Wearesho\Bobra\Ubki\Pull\Element;

use Wearesho\Bobra\Ubki;

/**
 * Trait DocumentTrait
 * @package Wearesho\Bobra\Ubki\Pull\Element
 */
trait DocumentTrait
{
    /** @var Ubki\Dictionary\DocumentType */
    protected $type;

    /** @var string */
    protected $serial;

    /** @var string */
    protected $number;

    public function getType(): Ubki\Dictionary\DocumentType
    {
        return $this->type;
    }

    public function getSerial(): string
    {
        return $this->serial;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function associativeAttributes(): array
    {
        return [
            DocumentInterface::TYPE => $this->getType(),
            DocumentInterface::SERIAL => $this->getSerial(),
            DocumentInterface::NUMBER => $this->getNumber(),
        ];
    }
}
