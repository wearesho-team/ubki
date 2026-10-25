<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki\Dictionaries;
use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Infrastructure\Element;

/**
 * Class RequestData
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class RequestData extends Element implements Data\Interfaces\RequestData
{
    use Data\Traits\RequestData;

    public function __construct(
        Dictionaries\RequestType $type,
        Dictionaries\RequestReason $reason,
        ?\DateTimeInterface $date = null,
        ?string $id = null,
        ?Dictionaries\RequestInitiator $initiator = null
    ) {
        $this->type = $type;
        $this->reason = $reason;
        $this->date = $date;
        $this->id = $id;
        $this->initiator = $initiator;
    }
}
