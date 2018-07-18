<?php

namespace Wearesho\Bobra\Ubki\Block;

use Wearesho\Bobra\Ubki;

/**
 * Class Identifying
 * @package Wearesho\Bobra\Ubki\Block
 */
class Identifying implements Ubki\Block
{
    protected const ID = 1;

    protected $credential;

    // todo: refactor after implementation of Credential element
    public function __construct($credential)
    {
        $this->credential = $credential;
    }

    public function getCredential()
    {
        return $this->credential;
    }
}
