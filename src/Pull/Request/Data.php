<?php

namespace Wearesho\Bobra\Ubki\Pull\Request;

use Wearesho\Bobra\Ubki;

/**
 * Class Data
 * @package Wearesho\Bobra\Ubki\Pull\Request
 */
class Data extends Ubki\Data\Element\RequestData
{
    /** @var Ubki\Pull\Report\Type */
    protected $type;

    public function __construct(
        Ubki\Pull\Report\Type $type,
        Ubki\Dictionary\RequestReason $reason,
        \DateTimeInterface $date = null,
        string $id = null,
        Ubki\Dictionary\RequestInitiator $initiator = null,
        string $version = '1.0'
    ) {
        $this->type = $type;

        parent::__construct($reason, $date, $id, $initiator, $version);
    }

    public function getType(): Ubki\Pull\Report\Type
    {
        return $this->type;
    }
}
