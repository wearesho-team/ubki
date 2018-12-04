<?php

namespace Wearesho\Bobra\Ubki\Data\Blocks;

use Wearesho\Bobra\Ubki;

/**
 * Class Identification
 * @package Wearesho\Bobra\Ubki\Data\Blocks
 */
class Identification extends Ubki\Infrastructure\Block
{
    public const ID = 1;

    /** @var Ubki\Data\Interfaces\Credential */
    protected $credential;

    public function __construct(Ubki\Data\Interfaces\Credential $credential)
    {
        $this->credential = $credential;
    }

    public function jsonSerialize(): array
    {
        return $this->credential->jsonSerialize();
    }

    public function getCredential(): Ubki\Data\Interfaces\Credential
    {
        return $this->credential;
    }
}
