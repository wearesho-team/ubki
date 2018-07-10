<?php

namespace Wearesho\Bobra\Ubki\Authorization;

/**
 * Interface ProviderInterface
 * @package Wearesho\Bobra\Ubki\Authorization
 */
interface ProviderInterface
{
    public function provide(ConfigInterface $config): Response;
}
