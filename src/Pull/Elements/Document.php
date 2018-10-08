<?php

namespace Wearesho\Bobra\Ubki\Pull\Elements;

use Wearesho\Bobra\Ubki\ElementInterface;
use Wearesho\Bobra\Ubki\ElementTrait;
use Wearesho\Bobra\Ubki\References\DocumentType;

/**
 * Class Document
 * @package Wearesho\Bobra\Ubki\Pull\Elements
 * @todo: implement base Document element for export/import
 */
class Document implements ElementInterface
{
    use ElementTrait;

    public const TAG = 'doc';
    public const TYPE = 'dtype';
    public const SERIAL = 'dser';
    public const NUMBER = 'dnom';

    /** @var DocumentType */
    protected $type;

    /** @var string */
    protected $serial;

    /** @var string */
    protected $number;

    public function __construct(DocumentType $type, string $serial, string $number)
    {
        $this->type = $type;
        $this->serial = $serial;
        $this->number = $number;
    }

    public function jsonSerialize(): array
    {
        return [
            static::TYPE => $this->type->getValue(),
            static::SERIAL => $this->serial,
            static::NUMBER => $this->number,
        ];
    }

    public function getType(): DocumentType
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
}
