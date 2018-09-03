<?php

namespace Wearesho\Bobra\Ubki\Blocks;

use Wearesho\Bobra\Ubki\Block;

/**
 * Class CompromisedPhonesInformation
 * @package Wearesho\Bobra\Ubki\Blocks
 * @deprecated
 */
class CompromisedPhonesInformation extends Block
{
    public const ID = 6;

    /** @var Entities\CompromisedPhone */
    protected $phone;

    public function __construct(Entities\CompromisedPhone $phone)
    {
        $this->phone = $phone;
    }

    public function getPhone(): Entities\CompromisedPhone
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
