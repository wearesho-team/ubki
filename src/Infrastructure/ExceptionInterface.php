<?php

namespace Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Interface ExceptionInterface
 *
 * Base exceptions interface for all exceptions in this library
 *
 * @package Wearesho\Bobra\Ubki\Infrastructure
 */
interface ExceptionInterface extends \Throwable
{
    public const CODE_UNKNOWN_ERROR = -1;
    public const CODE_INVALID_ANSWER = -2;
}
