<?php

namespace Wearesho\Bobra\Ubki\Block;

use Wearesho\Bobra\Ubki;

/**
 * Class CompromisedPhones
 * @package Wearesho\Bobra\Ubki\Block
 */
class CompromisedPhones extends Ubki\Block
{
    public const ID = 6;

    protected $phones;

    // todo: refactor after implementation BPhone element
    public function __construct($phones)
    {
        $this->phones = $phones;
    }

    public function getPhones()
    {
        return $this->phones;
    }
}
