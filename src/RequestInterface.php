<?php

namespace Wearesho\Bobra\Ubki;

use Wearesho\Bobra\Ubki\Data\Interfaces\RequestData;

/**
 * Interface RequestInterface
 * @package Wearesho\Bobra\Ubki
 */
interface RequestInterface extends ElementInterface
{
    public function getHead(): RequestData;

    public function getBody();
}
