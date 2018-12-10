<?php

namespace Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class Former
 * @package Wearesho\Bobra\Ubki\Infrastructure
 */
abstract class Former implements FormerInterface
{
    abstract public function form(): string;
}
