<?php

namespace Wearesho\Bobra\Ubki\Data\Blocks;

use Wearesho\Bobra\Ubki\Block;
use Wearesho\Bobra\Ubki\Data\Elements;

/**
 * Class CompromisedPhone
 * @package Wearesho\Bobra\Ubki\Data
 * @deprecated
 */
class CompromisedPhone extends Block
{
    public const ID = 6;

    /** @var Elements\BlackPhone */
    protected $phone;

    public function __construct(Elements\BlackPhone $phone)
    {
        $this->phone = $phone;
    }

    public function getPhone(): Elements\BlackPhone
    {
        return $this->phone;
    }

    public function jsonSerialize(): array
    {
        return [
            'compromisedPhone' => $this->phone->jsonSerialize(),
        ];
    }
}
