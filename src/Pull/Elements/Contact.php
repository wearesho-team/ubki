<?php

namespace Wearesho\Bobra\Ubki\Pull\Elements;

use Wearesho\Bobra\Ubki\ElementInterface;
use Wearesho\Bobra\Ubki\ElementTrait;
use Wearesho\Bobra\Ubki\References\ContactType;

/**
 * Class Contact
 * @package Wearesho\Bobra\Ubki\Pull\Data
 * @todo: implement base contact class for export/import
 */
class Contact implements ElementInterface
{
    use ElementTrait;

    public const TAG = 'cont';
    public const TYPE = 'ctype';
    public const VALUE = 'cval';

    /** @var ContactType */
    protected $type;

    /** @var string */
    protected $value;

    public function __construct(ContactType $type, string $value)
    {
        $this->type = $type;
        $this->value = $value;
    }

    public function jsonSerialize(): array
    {
        return [
            static::TYPE => $this->type->getValue(),
            static::VALUE => $this->value
        ];
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getType(): ContactType
    {
        return $this->type;
    }
}
