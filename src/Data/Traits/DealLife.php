<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki;

/**
 * Trait DealLife
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait DealLife
{
    /** @var string */
    protected $id;

    /** @var int */
    protected $periodMonth;

    /** @var int */
    protected $periodYear;

    /** @var \DateTimeInterface */
    protected $issueDate;

    /** @var \DateTimeInterface */
    protected $endDate;

    /** @var Ubki\Dictionaries\DealStatus */
    protected $status;

    /** @var float */
    protected $limit;

    /** @var float */
    protected $mandatoryPayment;

    /** @var float */
    protected $currentDebt;

    /** @var float */
    protected $currentOverdueDebt;

    /** @var int */
    protected $overdueTime;

    /** @var Ubki\Dictionaries\Flag */
    protected $paymentIndication;

    /** @var Ubki\Dictionaries\Flag */
    protected $delayIndication;

    /** @var Ubki\Dictionaries\Flag */
    protected $trancheIndication;

    /** @var \DateTimeInterface */
    protected $paymentDate;

    /**
     * This parameter is required if deal is closed
     *
     * @var \DateTimeInterface|null
     */
    protected $actualEndDate;

    public function jsonSerialize(): array
    {
        return [
            Ubki\Data\Interfaces\DealLife::ID => $this->id,
            Ubki\Data\Interfaces\DealLife::PERIOD_MONTH => $this->periodMonth,
            Ubki\Data\Interfaces\DealLife::PERIOD_YEAR => $this->periodYear,
            Ubki\Data\Interfaces\DealLife::ISSUE_DATE => $this->issueDate,
            Ubki\Data\Interfaces\DealLife::END_DATE => $this->endDate,
            Ubki\Data\Interfaces\DealLife::STATUS => $this->status,
            Ubki\Data\Interfaces\DealLife::LIMIT => $this->limit,
            Ubki\Data\Interfaces\DealLife::MANDATORY_PAYMENT => $this->mandatoryPayment,
            Ubki\Data\Interfaces\DealLife::CURRENT_DEBT => $this->currentDebt,
            Ubki\Data\Interfaces\DealLife::CURRENT_OVERDUE_DEBT => $this->currentOverdueDebt,
            Ubki\Data\Interfaces\DealLife::OVERDUE_TIME => $this->overdueTime,
            Ubki\Data\Interfaces\DealLife::PAYMENT_INDICATION => $this->paymentIndication,
            Ubki\Data\Interfaces\DealLife::DELAY_INDICATION => $this->delayIndication,
            Ubki\Data\Interfaces\DealLife::TRANCHE_INDICATION => $this->trancheIndication,
            Ubki\Data\Interfaces\DealLife::PAYMENT_DATE => $this->paymentDate,
            Ubki\Data\Interfaces\DealLife::ACTUAL_END_DATE => $this->actualEndDate,
        ];
    }

    public function tag(): string
    {
        return Ubki\Data\Interfaces\DealLife::TAG;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getPeriodMonth(): int
    {
        return $this->periodMonth;
    }

    public function getPeriodYear(): int
    {
        return $this->periodYear;
    }

    public function getIssueDate(): \DateTimeInterface
    {
        return $this->issueDate;
    }

    public function getEndDate(): \DateTimeInterface
    {
        return $this->endDate;
    }

    public function getStatus(): Ubki\Dictionaries\DealStatus
    {
        return $this->status;
    }

    public function getLimit(): float
    {
        return $this->limit;
    }

    public function getMandatoryPayment(): float
    {
        return $this->mandatoryPayment;
    }

    public function getCurrentDebt(): float
    {
        return $this->currentDebt;
    }

    public function getCurrentOverdueDebt(): float
    {
        return $this->currentOverdueDebt;
    }

    public function getOverdueTime(): int
    {
        return $this->overdueTime;
    }

    public function getPaymentIndication(): Ubki\Dictionaries\Flag
    {
        return $this->paymentIndication;
    }

    public function getDelayIndication(): Ubki\Dictionaries\Flag
    {
        return $this->delayIndication;
    }

    public function getCreditTrancheIndication(): Ubki\Dictionaries\Flag
    {
        return $this->trancheIndication;
    }

    public function getPaymentDate(): \DateTimeInterface
    {
        return $this->paymentDate;
    }

    public function getActualEndDate(): ?\DateTimeInterface
    {
        return $this->actualEndDate;
    }

    protected function validateActualEndDate(?string $actualEndDate, Ubki\Dictionaries\DealStatus $status): void
    {
        if (is_null($actualEndDate) && $status->equals(Ubki\Dictionaries\DealStatus::CLOSE())) {
            throw new \InvalidArgumentException("'Actual end date' must be set if deal status is CLOSE");
        }
    }
}
