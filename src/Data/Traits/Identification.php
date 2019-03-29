<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki;

/**
 * Trait Identification
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait Identification
{
    /** @var Ubki\Data\Interfaces\Credential */
    protected $credential;

    public function getCredential(): Ubki\Data\Interfaces\Credential
    {
        return $this->credential;
    }
}
