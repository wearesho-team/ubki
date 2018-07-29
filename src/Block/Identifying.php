<?php

namespace Wearesho\Bobra\Ubki\Block;

use Wearesho\Bobra\Ubki;

/**
 * Class Identifying
 * @package Wearesho\Bobra\Ubki\Block
 */
class Identifying extends Ubki\Block
{
    public const ID = 1;

    /** @var Ubki\Data\Credential\Entity */
    protected $credential;

    public function __construct(Ubki\Data\Credential\Entity $credential)
    {
        $this->credential = $credential;
    }

    public function getCredential(): Ubki\Data\Credential\Entity
    {
        return $this->credential;
    }
}
