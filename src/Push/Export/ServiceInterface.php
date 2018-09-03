<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki\RequestResponsePair;

/**
 * Interface ServiceInterface
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
interface ServiceInterface
{
    public function send(RequestInterface $request): RequestResponsePair;
}
