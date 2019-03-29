<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki;

/**
 * Trait ServiceTrait
 * @package Wearesho\Bobra\Ubki\Push\Export
 *
 * @mixin Ubki\Infrastructure\Service;
 */
trait ServiceTrait
{
    /** @var FormerInterface */
    protected $former;

    /**
     * @param RequestInterface $request
     *
     * @return Ubki\RequestResponsePair
     * @throws Ubki\Exception\Request
     * @throws Ubki\Exception\Former
     */
    public function export(RequestInterface $request): Ubki\RequestResponsePair
    {
        return $this->send($this->config->getPushUrl(), $request);
    }
}
