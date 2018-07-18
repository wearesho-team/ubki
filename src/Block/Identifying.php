<?php

namespace Wearesho\Bobra\Ubki\Block;

use Wearesho\Bobra\Ubki;

/**
 * Class Identifying
 * @package Wearesho\Bobra\Ubki\Block
 */
class Identifying extends Ubki\Block
{
    protected $credential;
    
    public function __construct($credential)
    {
        $this->credential = $credential;
    }

    public function type(): int
    {
        return static::IDENTIFYING;
    }

    public function getCredential()
    {
        return $this->credential;
    }
}
