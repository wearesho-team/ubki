<?php

namespace Wearesho\Bobra\Ubki\Pull;

/**
 * Interface FormerInterface
 * @package Wearesho\Bobra\Ubki\Pull
 */
interface FormerInterface extends \Wearesho\Bobra\Ubki\Infrastructure\FormerInterface
{
    public function form(RequestInterface $request, string $sessionId): string;
}
