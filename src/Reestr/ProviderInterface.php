<?php

namespace Wearesho\Bobra\Ubki\Reestr;

/**
 * Interface ProviderInterface
 *
 * @package Wearesho\Bobra\Ubki\Reestr
 */
interface ProviderInterface
{
    public function provide(RequestInterface $request): ResponseInterface;
}
