<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class InsuranceDeal
 * @package Wearesho\Bobra\Ubki\Data
 *
 * @method static InsuranceDeal make(...$arguments)
 */
class InsuranceDeal implements Ubki\Contract\Data\InsuranceDeal, \JsonSerializable
{
    use Makeable, Tagable;

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

    /** @var Ubki\Dictionary\InsuranceDeal */
    protected $type;

    /** @var Ubki\Dictionary\DealStatus */
    protected $status;

    /** @var Ubki\Data\Collection\InsuranceEvent */
    protected $events;

    public function __construct(
        string $inn,
        string $id,
        \DateTimeInterface $informationDate,
        \DateTimeInterface $startDate,
        \DateTimeInterface $endDate,
        Ubki\Dictionary\InsuranceDeal $type,
        Ubki\Dictionary\DealStatus $status,
        Ubki\Data\Collection\InsuranceEvent $events = \null,
        \DateTimeInterface $actualEndDate = \null
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
            'informationDate' => Carbon::make($this->informationDate),
            'startDate' => Carbon::make($this->startDate),
            'endDate' => Carbon::make($this->endDate),
            'actualEndDate' => Carbon::make($this->actualEndDate),
            'type' => $this->type,
            'status' => $this->status,
            'events' => $this->events,
        ];
    }

    public static function tag(): string
    {
        return 'insur';
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

    public function getType(): Ubki\Dictionary\InsuranceDeal
    {
        return $this->type;
    }

    public function getStatus(): Ubki\Dictionary\DealStatus
    {
        return $this->status;
    }

    public function getEvents(): Ubki\Data\Collection\InsuranceEvent
    {
        return $this->events;
    }
}
