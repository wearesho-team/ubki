<?php

namespace Wearesho\Bobra\Ubki\Pull;

use Wearesho\Bobra\Ubki\RequestResponsePair;

/**
 * Interface ServiceInterface
 * @package Wearesho\Bobra\Ubki\Pull
 */
interface ServiceInterface
{
    public function import(RequestInterface $request): RequestResponsePair;
}
