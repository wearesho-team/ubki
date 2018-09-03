<?php

namespace Wearesho\Bobra\Ubki\Pull;

use Wearesho\Bobra\Ubki\Blocks\Interfaces;

/**
 * Interface RequestInterface
 * @package Wearesho\Bobra\Ubki\Pull
 */
interface RequestInterface
{
    public function getHead(): Interfaces\RequestData;

    public function getBody(): IdentificationData;
}
