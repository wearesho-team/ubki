<?php

namespace Wearesho\Bobra\Ubki\Infrastructure;

use Wearesho\Bobra\Ubki;

/**
 * Interface ServiceInterface
 * @package Wearesho\Bobra\Ubki\Infrastructure
 */
interface ServiceInterface
{
    public function send(string $url, RequestInterface $request, array $headers = []): Ubki\RequestResponsePair;
}
