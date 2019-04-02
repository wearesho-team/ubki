<?php

namespace Wearesho\Bobra\Ubki\Exception;

use Wearesho\Bobra\Ubki\ExceptionInterface;

/**
 * Class UnknownError
 * @package Wearesho\Bobra\Ubki\Exception
 */
class UnknownError extends \RuntimeException implements ExceptionInterface
{
    public function __construct($message = "", \Throwable $previous = null)
    {
        parent::__construct($message, UnknownError::CODE_UNKNOWN_ERROR, $previous);
    }
}
