<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki\Data\Interfaces;
use Wearesho\Bobra\Ubki\Dictionaries;

/**
 * Trait RequestData
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait RequestData
{
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
            Interfaces\RequestData::VERSION => $this->version,
            Interfaces\RequestData::TYPE => $this->type,
            Interfaces\RequestData::REASON => $this->reason,
            Interfaces\RequestData::DATE => $this->date,
            Interfaces\RequestData::ID => $this->id,
            Interfaces\RequestData::INITIATOR => $this->initiator,
        ];
    }

    public function tag(): string
    {
        return Interfaces\RequestData::TAG;
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
