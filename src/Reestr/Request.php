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

    public function __construct(
        string $todo,
        \DateTimeInterface $indate,
        string $idout = "",
        string $idalien = ""
    ) {
        if (!$this->validateTodo($todo)) {
            throw new \InvalidArgumentException("Type of request have invalid value: {$todo}");
        }

        if (!$this->validateIndate($indate)) {
            throw new \InvalidArgumentException("Indate have invalid format: {$indate}");
        }

        $this->todo = $todo;
        $this->indate = $indate;
        $this->idout = $idout;
        $this->idalien = $idalien;
    }

    /**
     * Validate type of request
     *
     * @param string $todo
     *
     * @return bool
     */
    protected function validateTodo(string $todo): bool
    {
        return
            $todo !== static::TYPE_REP &&
            $todo !== static::TYPE_BIL;
    }
}
