<?php

namespace Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Interface FormerInterface
 * @package Wearesho\Bobra\Ubki\Infrastructure
 */
interface FormerInterface
{
    public function form(Formerable $data): string;
}
