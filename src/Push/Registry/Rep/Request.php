<?php

namespace Wearesho\Bobra\Ubki\Push\Registry\Rep;

use Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Class Request
 *
 * @package Wearesho\Bobra\Ubki\Push\Registry\Rep
 */
class Request extends Registry\Request
{
    public function __construct(
        \DateTimeInterface $indate,
        string $idout = "",
        string $idalien = ""
    ) {
        parent::__construct(
            Registry\Type::REP,
            $indate,
            $idout,
            $idalien
        );
    }
}
