<?php

namespace Wearesho\Bobra\Ubki\Reestr;

/**
 * Class Request
 *
 * @package Wearesho\Bobra\Ubki\Reestr
 */
class Request implements RequestInterface
{
    use RequestTrait;

    const TYPE_BIL = 'BIL';
    const TYPE_REP = 'REP';

    public function __construct(
        string $todo,
        string $indate,
        string $idout = "",
        string $idalien = ""
    ) {
        $this->todo = $todo;
        $this->indate = $indate;
        $this->idout = $idout;
        $this->idalien = $idalien;
    }
}
