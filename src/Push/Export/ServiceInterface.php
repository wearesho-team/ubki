<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki;

/**
 * Interface ServiceInterface
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
interface ServiceInterface
{
    public function export(RequestInterface $request): Ubki\RequestResponsePair;
}
