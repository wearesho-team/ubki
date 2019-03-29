<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki;

/**
 * Trait RequestData
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait RequestData
{
    /** @var string */
    protected $version = '1.0';

    /** @var Ubki\Dictionary\RequestReason */
    protected $reason;

    /** @var \DateTimeInterface|null */
    protected $date;

    /** @var string|null */
    protected $id;

    /** @var Ubki\Dictionary\RequestInitiator|null */
    protected $initiator;

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getReason(): Ubki\Dictionary\RequestReason
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

    public function getInitiator(): ?Ubki\Dictionary\RequestInitiator
    {
        return $this->initiator;
    }

    /**
     * @inheritdoc
     */
    public function associativeAttributes(): array
    {
        return [
            Ubki\Data\Interfaces\RequestData::ID => $this->getId(),
            Ubki\Data\Interfaces\RequestData::DATE => $this->getDate(),
            Ubki\Data\Interfaces\RequestData::TYPE => $this->getType(),
            Ubki\Data\Interfaces\RequestData::INITIATOR => $this->getInitiator(),
            Ubki\Data\Interfaces\RequestData::REASON => $this->getReason(),
            Ubki\Data\Interfaces\RequestData::VERSION => $this->getVersion(),
        ];
    }
}
