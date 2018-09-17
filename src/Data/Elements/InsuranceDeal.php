<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data\Collections;
use Wearesho\Bobra\Ubki\Dictionaries;
use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class InsuranceDeal
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class InsuranceDeal extends Infrastructure\Element
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

    /** @var Dictionaries\InsuranceDealType */
    protected $type;

    /** @var Dictionaries\DealStatus */
    protected $status;

    /** @var Collections\InsuranceEvents */
    protected $events;

    public function __construct(
        string $inn,
        string $id,
        \DateTimeInterface $informationDate,
        \DateTimeInterface $startDate,
        \DateTimeInterface $endDate,
        Dictionaries\InsuranceDealType $type,
        Dictionaries\DealStatus $status,
        Collections\InsuranceEvents $events = null,
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

        parent::__construct();
    }

    public function jsonSerialize(): array
    {
        return [
            static::INN => $this->inn,
            static::ID => $this->id,
            static::INFORMATION_DATE => $this->informationDate,
            static::START_DATE => $this->startDate,
            static::END_DATE => $this->endDate,
            static::TYPE => $this->type,
            static::STATUS => $this->status,
            static::ACTUAL_END_DATE => $this->actualEndDate,
            'events' => $this->events->jsonSerialize(),
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

    public function getType(): Dictionaries\InsuranceDealType
    {
        return $this->type;
    }

    public function getStatus(): Dictionaries\DealStatus
    {
        return $this->status;
    }

    public function getEvents(): Collections\InsuranceEvents
    {
        return $this->events;
    }
}
