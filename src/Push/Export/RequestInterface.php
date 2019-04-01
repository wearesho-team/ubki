<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki;

/**
 * Interface RequestInterface
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
interface RequestInterface extends Ubki\RequestInterface
{
    public function getHead(): Ubki\Data\RequestHead;

    public function getBody(): Request\Body;
}
