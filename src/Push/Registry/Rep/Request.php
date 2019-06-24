<?php

namespace Wearesho\Bobra\Ubki\Push\Registry\Rep;

use Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Class Request
 * @package Wearesho\Bobra\Ubki\Push\Registry\Rep
 */
class Request implements Registry\RequestInterface
{
    use Registry\RequestTrait;

    public function __construct(
        \DateTimeInterface $operationDate,
        string $ubkiId = "",
        string $partnerId = ""
    ) {
        $this->todo = Registry\Type::REP;
        $this->indate = $operationDate;
        $this->idout = $ubkiId;
        $this->idalien = $partnerId;
    }
}
