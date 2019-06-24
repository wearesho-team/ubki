<?php

namespace Wearesho\Bobra\Ubki\Push\Registry;

use Wearesho\Bobra\Ubki\RequestResponsePair;

/**
 * Interface ServiceInterface
 * @package Wearesho\Bobra\Ubki\Push\Registry
 */
interface ServiceInterface
{
    public function registry(RequestInterface $request): RequestResponsePair;
}
