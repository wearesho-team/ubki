<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki\References;
use Wearesho\Bobra\Ubki\Data;

/**
 * Class RequestData
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class RequestData implements Data\Interfaces\RequestData
{
    use Data\Traits\RequestData;

    public function __construct(
        References\RequestType $type,
        References\RequestReason $reason,
        ?\DateTimeInterface $date = null,
        ?string $id = null,
        ?References\RequestInitiator $initiator = null
    ) {
        $this->type = $type;
        $this->reason = $reason;
        $this->date = $date;
        $this->id = $id;
        $this->initiator = $initiator;
    }
}
