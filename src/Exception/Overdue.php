<?php

namespace Wearesho\Bobra\Ubki\Exception;

use Throwable;
use Wearesho\Bobra\Ubki;

/**
 * Class Overdue
 * @package Wearesho\Bobra\Ubki\Exception
 */
class Overdue extends \InvalidArgumentException implements Ubki\ExceptionInterface
{
    public function __construct(string $id, $code = 0, Throwable $previous = null)
    {
        parent::__construct(
            "Deal id: {$id}. The field number with overdue days can not be = 0 if the current delayed debt field is not equal to 0. (and vice versa)",//phpcs:ignore
            $code,
            $previous
        );
    }
}
