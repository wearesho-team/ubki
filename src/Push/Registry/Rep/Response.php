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
        Registry\Response\State $state,
        Registry\Response\OperationType $transferType,
        int $componentId,
        string $subComponentName,
        string $registryType,
        string $errorType,
        string $inn,
        string $remark
    ) {
        $this->type = Registry\Type::REP;
        $this->ertype = $registryType;
        $this->errorType = $errorType;
        $this->inn = $inn;
        $this->remark = $remark;
        $this->exportDate = $operationDate;
        $this->ubkiId = $ubkiId;
        $this->partnerId = $partnerId;
        $this->sessionId = $sessionId;
        $this->state = $state;
        $this->operationType = $transferType;
        $this->blockId = $componentId;
        $this->item = $subComponentName;
    }
}
