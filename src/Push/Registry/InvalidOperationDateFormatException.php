<?php

namespace Wearesho\Bobra\Ubki\Push\Registry;

use Carbon\Carbon;

/**
 * Class InvalidOperationDateException
 * @package Wearesho\Bobra\Ubki\Push\Registry
 */
class InvalidOperationDateFormatException extends \InvalidArgumentException
{
    /** @var \DateTimeInterface */
    protected $date;

    public function __construct(
        \DateTimeInterface $date,
        int $code = 0,
        \Throwable $previous = null
    ) {
        $this->date = $date;
        $format = new Carbon($date);

        parent::__construct(
            "Operation date have invalid format: {$format}",
            $code,
            $previous
        );
    }

    public function getDate(): string
    {
        return $this->date;
    }
}
