<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\ElementTrait;
use Wearesho\Bobra\Ubki\Dictionaries;

/**
 * Trait RequestData
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait RequestData
{
    use ElementTrait;

    /** @var string */
    protected $version = '1.0';

    /** @var Dictionaries\RequestType */
    protected $type;

    /** @var Dictionaries\RequestReason */
    protected $reason;

    /** @var \DateTimeInterface|null */
    protected $date;

    /** @var string|null */
    protected $id;

    /** @var Dictionaries\RequestInitiator|null */
    protected $initiator;

    public function jsonSerialize(): array
    {
        return [
            'version' => $this->version,
            'type' => $this->type->__toString(),
            'reason' => $this->reason->__toString(),
            'date' => Carbon::instance($this->date)->toDateString(),
            'id' => $this->id,
            'initiator' => $this->initiator->__toString(),
        ];
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getType(): Dictionaries\RequestType
    {
        return $this->type;
    }

    public function getReason(): Dictionaries\RequestReason
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

    public function getInitiator(): ?Dictionaries\RequestInitiator
    {
        return $this->initiator;
    }
}
