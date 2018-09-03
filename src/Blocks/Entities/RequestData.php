<?php

namespace Wearesho\Bobra\Ubki\Blocks\Entities;

use Wearesho\Bobra\Ubki\References;
use Wearesho\Bobra\Ubki\Blocks;

/**
 * Class RequestData
 * @package Wearesho\Bobra\Ubki\Blocks\Entities
 */
class RequestData implements Blocks\Interfaces\RequestData
{
    use Blocks\Traits\RequestData;

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
