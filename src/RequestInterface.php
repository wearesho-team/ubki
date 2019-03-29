<?php

namespace Wearesho\Bobra\Ubki;

use Wearesho\Bobra\Ubki\Data\RequestHead;

/**
 * Interface RequestInterface
 * @package Wearesho\Bobra\Ubki
 */
interface RequestInterface extends ElementInterface
{
    public function getHead(): RequestHead;

    public function getBody();
}
