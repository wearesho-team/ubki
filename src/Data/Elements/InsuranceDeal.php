<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data\Collections;

/**
 * Class InsuranceDeal
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class InsuranceDeal
{
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

    /** @var Collections\InsuranceEvents */
    protected $events;

    public function __construct(
        string $inn,
        string $id,
        \DateTimeInterface $informationDate,
        \DateTimeInterface $startDate,
        \DateTimeInterface $endDate,
        int $type,
        int $status,
        ?Collections\InsuranceEvents $events = null,
        ?\DateTimeInterface $actualEndDate = null
    ) {
        $this->inn = $inn;
        $this->id = $id;
        $this->informationDate = $informationDate;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->actualEndDate = $actualEndDate;
        $this->type = $type;
        $this->status = $status;
        $this->events = $events;
    }

    public function jsonSerialize(): array
    {
        return [
            'inn' => $this->inn,
            'id' => $this->id,
            'informationDate' => Carbon::instance($this->informationDate)->toDateString(),
            'startDate' => Carbon::instance($this->startDate)->toDateString(),
            'endDate' => Carbon::instance($this->endDate)->toDateString(),
            'type' => $this->type,
            'status' => $this->status,
            'actualEndDate' => !$this->actualEndDate ?: Carbon::instance($this->actualEndDate)->toDateString(),
            'events' => array_map(function (InsuranceEvent $event) {
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

    public function getEvents(): Collections\InsuranceEvents
    {
        return $this->events;
    }
}
