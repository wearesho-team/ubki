<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Contract\Data;

use Wearesho\Bobra\Ubki;

/**
 * Interface InsuranceDeal
 * @package Wearesho\Bobra\Ubki\Contract\Data
 */
interface InsuranceDeal
{
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

    public function getInn(): string;

    public function getId(): string;

    public function getInformationDate(): \DateTimeInterface;

    public function getStartDate(): \DateTimeInterface;

    public function getEndDate(): \DateTimeInterface;

    public function getActualEndDate(): ?\DateTimeInterface;

    public function getType(): Ubki\Dictionary\InsuranceDeal;

    public function getStatus(): Ubki\Dictionary\DealStatus;

    public function getEvents(): Ubki\Data\Collection\InsuranceEvent;
}
