<?php

namespace Wearesho\Bobra\Ubki\Reestr;

/**
 * Interface ServiceInterface
 *
 * @package Wearesho\Bobra\Ubki\Reestr
 */
interface ServiceInterface
{
    public function send(RequestInterface $request): ResponseInterface;
}
