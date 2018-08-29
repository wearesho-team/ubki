<?php

namespace Wearesho\Bobra\Ubki\Blocks;

use Wearesho\Bobra\Ubki\Block;

/**
 * Class Identification
 * @package Wearesho\Bobra\Ubki\Blocks
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

    public function getCredential(): Interfaces\Credential
    {
        return $this->credential;
    }
}
