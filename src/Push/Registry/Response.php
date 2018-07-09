<?php

namespace Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Class Response
 *
 * @package Wearesho\Bobra\Ubki\Push\Registry
 */
class Response implements ResponseInterface
{
    use ResponseTrait;

    public function __construct(
        string $todo,
        \DateTimeInterface $indate,
        string $idout,
        string $idalien,
        string $sessid,
        string $state,
        string $oper,
        int $compid,
        string $item
    ) {
        $this->todo = $todo;
        $this->indate = $indate;
        $this->idout = $idout;
        $this->idalien = $idalien;
        $this->sessid = $sessid;
        $this->state = $state;
        $this->oper = $oper;
        $this->compid = $compid;
        $this->item = $item;
    }
}
