<?php

namespace Wearesho\Bobra\Ubki\Infrastructure;

use Wearesho\Bobra\Ubki\Data\Interfaces\RequestData;

/**
 * Interface RequestInterface
 * @package Wearesho\Bobra\Ubki\Infrastructure
 */
interface RequestInterface extends ElementInterface
{
    public function getHead(): RequestData;

    public function getBody();
}
