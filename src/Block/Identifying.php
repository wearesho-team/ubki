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

    protected $credential;

    // todo: refactor after implementing Credential element
    public function __construct($credential)
    {
        $this->credential = $credential;
    }

    public function getCredential()
    {
        return $this->credential;
    }
}
