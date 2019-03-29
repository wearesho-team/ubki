<?php

namespace Wearesho\Bobra\Ubki\Exception;

use Wearesho\Bobra\Ubki;

/**
 * Class UnsupportedMode
 * @package Wearesho\Bobra\Ubki\Exception
 */
class UnsupportedMode extends \InvalidArgumentException implements Ubki\ExceptionInterface
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
