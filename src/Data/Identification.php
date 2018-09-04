<?php

namespace Wearesho\Bobra\Ubki\Data;

use Wearesho\Bobra\Ubki\Block;

/**
 * Class Identification
 * @package Wearesho\Bobra\Ubki\Data
 */
class Identification extends Block
{
    public const ID = 1;

    /** @var Interfaces\Credential */
    protected $credential;

    public function __construct(Interfaces\Credential $credential)
    {
        $this->credential = $credential;
    }

    public function jsonSerialize(): array
    {
        return [
            'credential' => $this->credential->jsonSerialize(),
        ];
    }

    public function getCredential(): Interfaces\Credential
    {
        return $this->credential;
    }
}
