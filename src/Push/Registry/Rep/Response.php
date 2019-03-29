<?php

namespace Wearesho\Bobra\Ubki\Push\Registry\Rep;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Class Response
 * @package Wearesho\Bobra\Ubki\Push\Registry\Rep
 */
class Response implements ResponseInterface, \JsonSerializable
{
    use Registry\ResponseTrait;
    use ResponseTrait;

    public function __construct(
        \DateTimeInterface $exportDate,
        string $ubkiId,
        string $partnerId,
        string $sessionId,
        Registry\Response\State $state,
        Registry\Response\OperationType $operationType,
        int $blockId,
        string $item,
        string $registryType,
        string $errorType,
        string $inn,
        string $remark
    ) {
        $this->type = Registry\Type::REP;
        $this->registryType = $registryType;
        $this->errorType = $errorType;
        $this->inn = $inn;
        $this->remark = $remark;
        $this->exportDate = $exportDate;
        $this->ubkiId = $ubkiId;
        $this->partnerId = $partnerId;
        $this->sessionId = $sessionId;
        $this->state = $state;
        $this->operationType = $operationType;
        $this->blockId = $blockId;
        $this->item = $item;
    }

    public function jsonSerialize(): array
    {
        return [
            'exportDate' => Carbon::instance($this->exportDate)->toDateString(),
            'ubkiId' => $this->ubkiId,
            'partnerId' => $this->partnerId,
            'sessionId' => $this->sessionId,
            'state' => $this->state->getKey(),
            'operation' => $this->operationType->getKey(),
            'blockId' => $this->blockId,
            'item' => $this->item,
            'registry' => $this->registryType,
            'error' => $this->errorType,
            'inn' => $this->inn,
            'remark' => $this->remark
        ];
    }
}
