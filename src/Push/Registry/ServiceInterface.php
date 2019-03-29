<?php

namespace Wearesho\Bobra\Ubki\Push\Registry;

use Wearesho\Bobra\Ubki\RequestResponsePair;

/**
 * Interface ServiceInterface
 * @package Wearesho\Bobra\Ubki\Push\Registry
 * @deprecated
 */
interface ServiceInterface
{
    public function send(RequestInterface $request): RequestResponsePair;
}
