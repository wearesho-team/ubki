<?php

namespace Wearesho\Bobra\Ubki\Reestr;

/**
 * Class Response
 *
 * @package Wearesho\Bobra\Ubki\Reestr
 */
class Response implements ResponseInterface
{
    use ResponseTrait;

    public const STATE_PROCESSED = 'r';
    public const STATE_TRANSMITTED = 'n';
    public const STATE_CREATED = 'i';
    public const STATE_BLOCKED = 'b';
    public const STATE_SQL_ERROR = 'e';

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

    public function isStateProcessed(): bool
    {
        return $this->state === static::STATE_PROCESSED;
    }

    public function isStateTransmitted(): bool
    {
        return $this->state === static::STATE_TRANSMITTED;
    }

    public function isStateCreated(): bool
    {
        return $this->state === static::STATE_CREATED;
    }

    public function isStateBlocked(): bool
    {
        return $this->state === static::STATE_BLOCKED;
    }

    public function isStateError(): bool
    {
        return $this->state === static::STATE_SQL_ERROR;
    }
}
