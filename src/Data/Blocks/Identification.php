<?php

namespace Wearesho\Bobra\Ubki\Data\Blocks;

use Wearesho\Bobra\Ubki\Block;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class Identification
 * @package Wearesho\Bobra\Ubki\Data\Blocks
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
        return $this->credential->jsonSerialize();
    }

    public function getCredential(): Interfaces\Credential
    {
        return $this->credential;
    }
}
