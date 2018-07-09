<?php

namespace Wearesho\Bobra\Ubki\Push\Registry\Rep;

use Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Class Response
 *
 * @package Wearesho\Bobra\Ubki\Push\Registry\Rep
 */
class Response extends Registry\Response implements ResponseInterface
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
        string $subcomponentName,
        string $registryType,
        string $errorType,
        int $inn,
        string $remark
    ) {
        $this->ertype = $registryType;
        $this->crytical = $errorType;
        $this->inn = $inn;
        $this->remark = $remark;

        parent::__construct(
            $type,
            $operationDate,
            $ubkiId,
            $partnerId,
            $sessionId,
            $state,
            $transferType,
            $componentId,
            $subcomponentName
        );
    }
}
