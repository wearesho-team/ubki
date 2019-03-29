<?php

namespace Wearesho\Bobra\Ubki;

use Wearesho\Bobra\Ubki;

/**
 * Interface ServiceInterface
 * @package Wearesho\Bobra\Ubki
 */
interface ServiceInterface
{
    public function send(string $url, RequestInterface $request, array $options = []): Ubki\RequestResponsePair;
}
