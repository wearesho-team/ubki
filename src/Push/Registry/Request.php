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
        string $todo,
        \DateTimeInterface $indate,
        string $idout = "",
        string $idalien = ""
    ) {
        $this->validateTodo($todo);
        $this->validateIndate($indate);

        $this->todo = $todo;
        $this->indate = $indate;
        $this->idout = $idout;
        $this->idalien = $idalien;
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
            throw new \InvalidArgumentException("Type of request have invalid value: {$todo}");
        }
    }
}
