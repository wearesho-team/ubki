<?php

namespace Wearesho\Bobra\Ubki\Component;

use Wearesho\Bobra\Ubki;

/**
 * Class Identifying
 * @package Wearesho\Bobra\Ubki\Component
 */
class Identifying extends Ubki\BaseComponent
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
