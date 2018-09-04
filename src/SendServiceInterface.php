<?php

namespace Wearesho\Bobra\Ubki;

/**
 * Interface SendServiceInterface
 * @package Wearesho\Bobra\Ubki
 */
interface SendServiceInterface
{
    public function send(RequestInterface $request): RequestResponsePair;

    public function config(): Push\ConfigInterface;
}
