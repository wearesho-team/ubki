<?php

namespace Wearesho\Bobra\Ubki\Data\Element;

use Wearesho\Bobra\Ubki;

/**
 * Class RequestData
 * @package Wearesho\Bobra\Ubki\Data\Element
 */
class RequestData extends Ubki\Infrastructure\Element implements Ubki\Data\Interfaces\RequestData
{
    use Ubki\Data\Traits\RequestData;

    public const TAG = 'request';

    public function __construct(
        Ubki\Dictionary\RequestType $type,
        Ubki\Dictionary\RequestReason $reason,
        \DateTimeInterface $date = null,
        string $id = null,
        Ubki\Dictionary\RequestInitiator $initiator = null,
        string $version = '1.0'
    ) {
        $this->type = $type;
        $this->reason = $reason;
        $this->date = $date;
        $this->id = $id;
        $this->initiator = $initiator;
        $this->version = $version;
    }
}
