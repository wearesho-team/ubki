<?php

namespace Wearesho\Bobra\Ubki\Authorization;

use Throwable;

/**
 * Class UnsupportedModeException
 *
 * @package Wearesho\Bobra\Ubki\Authorization
 */
class UnsupportedModeException extends \InvalidArgumentException
{
    /** @var int */
    public $mode;

    public function __construct(
        int $mode,
        int $code = 0,
        Throwable $previous = null
    ) {
        $this->mode = $mode;

        parent::__construct("Mode have invalid value {$mode}", $code, $previous);
    }
}
