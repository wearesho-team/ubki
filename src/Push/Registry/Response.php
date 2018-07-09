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
        string $type,
        \DateTimeInterface $operationDate,
        string $ubkiId,
        string $partnerId,
        string $sessionId,
        string $state,
        string $transferType,
        int $componentId,
        string $subcomponentName
    ) {
        $this->todo = $type;
        $this->indate = $operationDate;
        $this->idout = $ubkiId;
        $this->idalien = $partnerId;
        $this->sessid = $sessionId;
        $this->state = $state;
        $this->oper = $transferType;
        $this->compid = $componentId;
        $this->item = $subcomponentName;
    }
}
