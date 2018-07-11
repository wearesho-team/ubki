<?php

namespace Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Interface ServiceInterface
 *
 * @package Wearesho\Bobra\Ubki\Push\Registry
 */
interface ServiceInterface
{
    public function send(RequestInterface $request): ResponseCollection;
}
