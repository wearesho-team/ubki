<?php

namespace Wearesho\Bobra\Ubki\Blocks;

use Wearesho\Bobra\Ubki\Block;
use Wearesho\Bobra\Ubki\Blocks\Entities\Credential;

/**
 * Class Identification
 * @package Wearesho\Bobra\Ubki\Blocks
 */
class Identification extends Block
{
    public const ID = 1;

    /** @var Credential */
    protected $credential;

    public function __construct(Credential $credential)
    {
        $this->credential = $credential;
    }

    public function getCredential(): Credential
    {
        return $this->credential;
    }
}
