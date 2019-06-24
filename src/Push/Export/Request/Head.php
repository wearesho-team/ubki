<?php

namespace Wearesho\Bobra\Ubki\Push\Export\Request;

use Wearesho\Bobra\Ubki;

/**
 * Class Head
 * @package Wearesho\Bobra\Ubki\Push\Export\Request
 */
class Head extends Ubki\Data\RequestHead
{
    /** @var Type */
    protected $type;

    public function __construct(
        Type $type,
        Ubki\Dictionary\RequestReason $reason,
        \DateTimeInterface $date = \null,
        string $id = \null,
        Ubki\Dictionary\RequestInitiator $initiator = \null,
        string $version = '1.0'
    ) {
        $this->type = $type;

        parent::__construct($reason, $date, $id, $initiator, $version);
    }

    public function getType(): Type
    {
        return $this->type;
    }
}
