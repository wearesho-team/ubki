<?php

namespace Wearesho\Bobra\Ubki\Pull;

use Wearesho\Bobra\Ubki;

/**
 * Trait ServiceTrait
 * @package Wearesho\Bobra\Ubki\Pull
 *
 * @mixin Ubki\Infrastructure\Service
 */
trait ServiceTrait
{
    /**
     * @param RequestInterface $request
     *
     * @return Ubki\RequestResponsePair
     * @throws Ubki\Exception\Request
     * @throws Ubki\Exception\Former
     */
    public function import(RequestInterface $request): Ubki\RequestResponsePair
    {
        return $this->send($this->config->getPullUrl(), $request);
    }
}
