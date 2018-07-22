<?php

namespace Wearesho\Bobra\Ubki\Push\Registry\Rep;

use Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Class Response
 *
 * @package Wearesho\Bobra\Ubki\Push\Registry\Rep
 */
class Response implements ResponseInterface
{
    use Registry\ResponseTrait;
    use ResponseTrait;

    public function __construct(
        \DateTimeInterface $operationDate,
        string $ubkiId,
        string $partnerId,
        string $sessionId,
        string $state,
        string $transferType,
        int $componentId,
        string $subComponentName,
        string $registryType,
        string $errorType,
        string $inn,
        string $remark
    ) {
        $this->todo = Registry\Type::REP;
        $this->ertype = $registryType;
        $this->crytical = $errorType;
        $this->inn = $inn;
        $this->remark = $remark;
        $this->indate = $operationDate;
        $this->idout = $ubkiId;
        $this->idalien = $partnerId;
        $this->sessid = $sessionId;
        $this->state = $state;
        $this->oper = $transferType;
        $this->compid = $componentId;
        $this->item = $subComponentName;
    }
}
