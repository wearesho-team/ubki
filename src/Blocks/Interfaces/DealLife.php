<?php

namespace Wearesho\Bobra\Ubki\Blocks\Interfaces;

use Wearesho\Bobra\Ubki\ElementInterface;
use Wearesho\Bobra\Ubki\References;

/**
 * Interface DealLife
 * @package Wearesho\Bobra\Ubki\Blocks\Interfaces
 */
interface DealLife extends ElementInterface
{
    public const TAG = 'deallife';
    public const ID = 'dlref';
    public const PERIOD_MONTH = 'dlmonth';
    public const PERIOD_YEAR = 'dlyear';
    public const ISSUE_DATE = 'dlds';
    public const END_DATE = 'dldpf';
    public const ACTUAL_END_DATE = 'dldff';
    public const STATUS = 'dlflstat';
    public const STATUS_REF = 'dlflstatref';
    public const LIMIT = 'dlamtlim';
    public const MANDATORY_PAYMENT = 'dlamtpaym';
    public const CURRENT_DEBT = 'dlamtcur';
    public const CURRENT_OVERDUE_DEBT = 'dlamtexp';
    public const OVERDUE_TIME = 'dldayexp';
    public const PAYMENT_INDICATION = 'dlflpay';
    public const PAYMENT_INDICATION_REF = 'dlflpayref';
    public const DELAY_INDICATION = 'dlflbrk';
    public const DELAY_INDICATION_REF = 'dlflbrkref';
    public const TRANCHE_INDICATION = 'dlfluse';
    public const CREDIT_TRANCHE_INDICATION_REF = 'dlfluseref';
    public const PAYMENT_DATE = 'dldateclc';

    public function getId(): string;

    public function getPeriodMonth(): int;

    public function getPeriodYear(): int;

    public function getIssueDate(): \DateTimeInterface;

    public function getEndDate(): \DateTimeInterface;

    public function getStatus(): References\DealStatus;

    public function getLimit(): float;

    public function getMandatoryPayment(): float;

    public function getCurrentDebt(): float;

    public function getCurrentOverdueDebt(): float;

    public function getOverdueTime(): int;

    public function getPaymentIndication(): References\Flag;

    public function getDelayIndication(): References\Flag;

    public function getTrancheIndication(): References\Flag;

    public function getPaymentDate(): \DateTimeInterface;

    public function getActualEndDate(): ?\DateTimeInterface;
}
