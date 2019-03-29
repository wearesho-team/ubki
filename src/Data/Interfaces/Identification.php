<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

use Wearesho\Bobra\Ubki;

/**
 * Interface Identification
 * @package Wearesho\Bobra\Ubki\Data\Interfaces
 */
interface Identification extends Ubki\ElementInterface
{
    public function getCredential(): Ubki\Data\Interfaces\Credential;
}
