<?php

namespace Wearesho\Bobra\Ubki\Infrastructure;

use Wearesho\Bobra\Ubki;

/**
 * Interface ServiceInterface
 * @package Wearesho\Bobra\Ubki\Infrastructure
 */
interface ServiceInterface
{
    public function send(RequestInterface $request): Ubki\RequestResponsePair;

    public function config(): ConfigInterface;
}
