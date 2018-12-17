<?php

namespace Wearesho\Bobra\Ubki\Data\Element;

use Wearesho\Bobra\Ubki;

/**
 * Class InsuranceDeal
 * @package Wearesho\Bobra\Ubki\Data\Element
 */
class InsuranceDeal extends Ubki\Infrastructure\Element
{
    public const TAG = 'insur';
    public const INN = 'inn';
    public const ID = 'dlref';
    public const INFORMATION_DATE = 'dldate';
    public const START_DATE = 'dlds';
    public const END_DATE = 'dldpf';
    public const ACTUAL_END_DATE = 'dldff';
    public const TYPE = 'dltype';
    public const TYPE_REF = 'dltyperef';
    public const STATUS = 'dlstate';
    public const STATUS_REF = 'dlstateref';

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

    /** @var Ubki\Dictionary\InsuranceDealType */
    protected $type;

    /** @var Ubki\Dictionary\DealStatus */
    protected $status;

    /** @var Ubki\Data\Collection\InsuranceEvents */
    protected $events;

    public function __construct(
        string $inn,
        string $id,
        \DateTimeInterface $informationDate,
        \DateTimeInterface $startDate,
        \DateTimeInterface $endDate,
        Ubki\Dictionary\InsuranceDealType $type,
        Ubki\Dictionary\DealStatus $status,
        Ubki\Data\Collection\InsuranceEvents $events = null,
        \DateTimeInterface $actualEndDate = null
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

    public function getType(): Ubki\Dictionary\InsuranceDealType
    {
        return $this->type;
    }

    public function getStatus(): Ubki\Dictionary\DealStatus
    {
        return $this->status;
    }

    public function getEvents(): Ubki\Data\Collection\InsuranceEvents
    {
        return $this->events;
    }
}
