<?php

namespace Wearesho\Bobra\Ubki\Reestr\Rep;

use Wearesho\Bobra\Ubki\Reestr;

/**
 * Class Request
 *
 * @package Wearesho\Bobra\Ubki\Reestr\Rep
 */
class Request extends Reestr\Request
{
    public function __construct(
        \DateTimeInterface $indate,
        string $idout = "",
        string $idalien = ""
    ) {
        parent::__construct(
            static::TYPE_REP,
            $indate,
            $idout,
            $idalien
        );
    }
}
