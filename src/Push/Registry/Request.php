<?php

namespace Wearesho\Bobra\Ubki\Push\Registry;

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
        \DateTimeInterface $operationDate,
        string $ubkiId = "",
        string $partnerId = ""
    ) {
        $this->validateTodo($type);

        $this->todo = $type;
        $this->indate = $operationDate;
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
        if ($todo !== Type::REP && $todo !== Type::BIL) {
            throw new InvalidRequestTypeException($todo);
        }
    }
}
