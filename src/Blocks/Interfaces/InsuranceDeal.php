<?php

namespace Wearesho\Bobra\Ubki\Blocks\Interfaces;

use Wearesho\Bobra\Ubki\ElementInterface;
use Wearesho\Bobra\Ubki\Blocks;

/**
 * Interface InsuranceDeal
 * @package Wearesho\Bobra\Ubki\Blocks\Interfaces
 */
interface InsuranceDeal extends ElementInterface
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

    public function getInn(): string;

    public function getId(): string;

    public function getInformationDate(): \DateTimeInterface;

    public function getStartDate(): \DateTimeInterface;

    public function getEndDate(): \DateTimeInterface;

    public function getActualEndDate(): ?\DateTimeInterface;

    public function getType(): int;

    public function getStatus(): int;

    public function getEvents(): Blocks\Collections\InsuranceEvents;
}
