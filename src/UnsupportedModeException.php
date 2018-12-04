<?php

namespace Wearesho\Bobra\Ubki;

/**
 * Class UnsupportedModeException
 * @package Wearesho\Bobra\Ubki
 */
class UnsupportedModeException extends \InvalidArgumentException implements ExceptionInterface
{
    /** @var int */
    public $mode;

    public function __construct(
        int $mode,
        int $code = 0,
        \Throwable $previous = null
    ) {
        $this->mode = $mode;

        parent::__construct(
            'Mode have invalid value ' . $mode,
            $code,
            $previous
        );
    }
}
