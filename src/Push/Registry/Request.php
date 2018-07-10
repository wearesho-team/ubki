<?php

namespace Wearesho\Bobra\Ubki\Push\Registry;

use Carbon\Carbon;

/**
 * Class Request
 *
 * @package Wearesho\Bobra\Ubki\Push\Registry
 */
class Request implements RequestInterface
{
    use RequestTrait;

    public function __construct(
        string $type,
        string $operationDate,
        string $ubkiId = "",
        string $partnerId = ""
    ) {
        $this->validateTodo($type);
        $this->validateIndate($operationDate);

        $this->todo = $type;
        $this->indate = Carbon::parse($operationDate)->format('Ymd');
        $this->idout = $ubkiId;
        $this->idalien = $partnerId;
    }

    /**
     * Validate type of request
     *
     * @param string $todo
     */
    protected function validateTodo(string $todo): void
    {
        if (
            $todo !== Type::REP &&
            $todo !== Type::BIL
        ) {
            throw new InvalidRequestTypeException($todo);
        }
    }
}
