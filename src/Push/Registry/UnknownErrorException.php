<?php

namespace Wearesho\Bobra\Ubki\Push\Registry;

use Wearesho\Bobra\Ubki;

/**
 * Class UnknownErrorException
 *
 * @package Wearesho\Bobra\Ubki\Push\Registry
 */
class UnknownErrorException extends \Exception
{
    public function __construct(
        string $message = "",
        \Throwable $previous = null
    ) {
        parent::__construct(
            $message,
            Ubki\Exception::CODE_UNKNOWN_ERROR,
            $previous
        );
    }
}
