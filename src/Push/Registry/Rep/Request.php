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
        \DateTimeInterface $operationDate,
        string $ubkiId = "",
        string $partnerId = ""
    ) {
        parent::__construct(
            Registry\Type::REP,
            $operationDate,
            $ubkiId,
            $partnerId
        );
    }
}
