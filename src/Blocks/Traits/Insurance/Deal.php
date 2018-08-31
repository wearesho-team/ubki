<?php

namespace Wearesho\Bobra\Ubki\Blocks\Traits\Insurance;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\ElementTrait;
use Wearesho\Bobra\Ubki\Blocks\Interfaces;
use Wearesho\Bobra\Ubki\Blocks\Collections;

/**
 * Trait Deal
 * @package Wearesho\Bobra\Ubki\Blocks\Traits\Insurance
 */
trait Deal
{
    use ElementTrait;

    /** @var string */
    protected $inn;

    /** @var string */
    protected $id;

    /** @var \DateTimeInterface */
    protected $informationDate;

    /** @var \DateTimeInterface */
    protected $startDate;

    /** @var \DateTimeInterface */
    protected $endDate;

    /** @var \DateTimeInterface|null */
    protected $actualEndDate;

    /** @var int */
    protected $type;

    /** @var int */
    protected $status;

    /** @var Collections\Insurance\Events */
    protected $events;

    public function jsonSerialize()
    {
        return [
            'inn' => $this->inn,
            'id' => $this->id,
            'informationDate' => Carbon::instance($this->informationDate)->toDateString(),
            'startDate' => Carbon::instance($this->startDate)->toDateString(),
            'endDate' => Carbon::instance($this->endDate)->toDateString(),
            'type' => $this->type,
            'status' => $this->status,
            'actualEndDate' => !is_null($this->actualEndDate)
                ? Carbon::instance($this->actualEndDate)->toDateString()
                : null,
            'events' => array_map(function (Interfaces\Insurance\Event $event) {
                return $event->jsonSerialize();
            }, $this->events->jsonSerialize()),
        ];
    }

    public function getInn(): string
    {
        return $this->inn;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getInformationDate(): \DateTimeInterface
    {
        return $this->informationDate;
    }

    public function getStartDate(): \DateTimeInterface
    {
        return $this->startDate;
    }

    public function getEndDate(): \DateTimeInterface
    {
        return $this->endDate;
    }

    public function getActualEndDate(): ?\DateTimeInterface
    {
        return $this->actualEndDate;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getEvents(): Collections\Insurance\Events
    {
        return $this->events;
    }
}
