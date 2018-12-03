<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class RequestData
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class RequestData extends Ubki\Infrastructure\Element implements Ubki\Data\Interfaces\RequestData
{
    use Ubki\Data\Traits\RequestData;

    public function __construct(
        Ubki\Dictionaries\RequestType $type,
        Ubki\Dictionaries\RequestReason $reason,
        \DateTimeInterface $date = null,
        string $id = null,
        Ubki\Dictionaries\RequestInitiator $initiator = null
    ) {
        $this->type = $type;
        $this->reason = $reason;
        $this->date = $date;
        $this->id = $id;
        $this->initiator = $initiator;
    }
}
