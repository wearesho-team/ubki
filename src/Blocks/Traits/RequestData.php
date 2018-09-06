<?php

namespace Wearesho\Bobra\Ubki\Blocks\Traits;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\ElementTrait;
use Wearesho\Bobra\Ubki\References;

/**
 * Trait RequestData
 * @package Wearesho\Bobra\Ubki\Blocks\Traits
 */
trait RequestData
{
    use ElementTrait;

    /** @var string */
    protected $version = '1.0';

    /** @var References\RequestType */
    protected $type;

    /** @var References\RequestReason */
    protected $reason;

    /** @var \DateTimeInterface|null */
    protected $date;

    /** @var string|null */
    protected $id;

    /** @var References\RequestInitiator|null */
    protected $initiator;

    public function jsonSerialize(): array
    {
        return [
            'version' => $this->version,
            'type' => $this->type->__toString(),
            'reason' => $this->reason->__toString(),
            'date' => Carbon::instance($this->date)->toDateTimeString(),
            'id' => $this->id,
            'initiator' => $this->initiator->__toString(),
        ];
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getType(): References\RequestType
    {
        return $this->type;
    }

    public function getReason(): References\RequestReason
    {
        return $this->reason;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getInitiator(): ?References\RequestInitiator
    {
        return $this->initiator;
    }
}
