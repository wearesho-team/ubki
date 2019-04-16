<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Contract\Data;

use Wearesho\Bobra\Ubki;

/**
 * Interface Tech
 * @package Wearesho\Bobra\Ubki\Contract\Data
 */
interface Tech
{
    public function getTrace(): Ubki\Data\Collection\Trace;

    public function getId(): string;

    public function getBalance(): Balance;
}
