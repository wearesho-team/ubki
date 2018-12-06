<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class InsuranceDeal
 * @package Wearesho\Bobra\Ubki\Data\Elements
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

    /** @var Ubki\Dictionaries\InsuranceDealType */
    protected $type;

    /** @var Ubki\Dictionaries\DealStatus */
    protected $status;

    /** @var Ubki\Data\Collections\InsuranceEvents */
    protected $events;

    public function __construct(
        string $inn,
        string $id,
        \DateTimeInterface $informationDate,
        \DateTimeInterface $startDate,
        \DateTimeInterface $endDate,
        Ubki\Dictionaries\InsuranceDealType $type,
        Ubki\Dictionaries\DealStatus $status,
        Ubki\Data\Collections\InsuranceEvents $events = null,
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

    public function jsonSerialize(): array
    {
        return [
            static::INN => $this->getInn(),
            static::ID => $this->getId(),
            static::INFORMATION_DATE => $this->getInformationDate(),
            static::START_DATE => $this->getStartDate(),
            static::END_DATE => $this->getEndDate(),
            static::TYPE => $this->getType(),
            static::STATUS => $this->getStatus(),
            static::ACTUAL_END_DATE => $this->getActualEndDate(),
            'events' => $this->events,
        ];
    }

    public function tag(): string
    {
        return static::TAG;
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

    public function getType(): Ubki\Dictionaries\InsuranceDealType
    {
        return $this->type;
    }

    public function getStatus(): Ubki\Dictionaries\DealStatus
    {
        return $this->status;
    }

    public function getEvents(): Ubki\Data\Collections\InsuranceEvents
    {
        return $this->events;
    }
}
