<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Dictionaries;
use Wearesho\Bobra\Ubki\Data\Interfaces;

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

    /** @var Dictionaries\DealStatus */
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

    /** @var Dictionaries\Flag */
    protected $paymentIndication;

    /** @var Dictionaries\Flag */
    protected $delayIndication;

    /** @var Dictionaries\Flag */
    protected $creditTrancheIndication;

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
            Interfaces\DealLife::ID => $this->id,
            Interfaces\DealLife::PERIOD_MONTH => $this->periodMonth,
            Interfaces\DealLife::PERIOD_YEAR => $this->periodYear,
            Interfaces\DealLife::ISSUE_DATE => $this->issueDate,
            Interfaces\DealLife::END_DATE => $this->endDate,
            Interfaces\DealLife::STATUS => $this->status,
            Interfaces\DealLife::LIMIT => $this->limit,
            Interfaces\DealLife::MANDATORY_PAYMENT => $this->mandatoryPayment,
            Interfaces\DealLife::CURRENT_DEBT => $this->currentDebt,
            Interfaces\DealLife::CURRENT_OVERDUE_DEBT => $this->currentOverdueDebt,
            Interfaces\DealLife::OVERDUE_TIME => $this->overdueTime,
            Interfaces\DealLife::PAYMENT_INDICATION => $this->paymentIndication,
            Interfaces\DealLife::DELAY_INDICATION => $this->delayIndication,
            Interfaces\DealLife::CREDIT_TRANCHE_INDICATION => $this->creditTrancheIndication,
            Interfaces\DealLife::PAYMENT_DATE => $this->paymentDate,
            Interfaces\DealLife::ACTUAL_END_DATE => $this->actualEndDate,
        ];
    }

    public function tag(): string
    {
        return Interfaces\DealLife::TAG;
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

    public function getStatus(): Dictionaries\DealStatus
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

    public function getPaymentIndication(): Dictionaries\Flag
    {
        return $this->paymentIndication;
    }

    public function getDelayIndication(): Dictionaries\Flag
    {
        return $this->delayIndication;
    }

    public function getCreditTrancheIndication(): Dictionaries\Flag
    {
        return $this->creditTrancheIndication;
    }

    public function getPaymentDate(): \DateTimeInterface
    {
        return $this->paymentDate;
    }

    public function getActualEndDate(): ?\DateTimeInterface
    {
        return $this->actualEndDate;
    }

    protected function validateActualEndDate(?string $actualEndDate, Dictionaries\DealStatus $status): void
    {
        if (is_null($actualEndDate) && $status->equals(Dictionaries\DealStatus::CLOSE())) {
            throw new \InvalidArgumentException("'Actual end date' must be set if deal status is CLOSE");
        }
    }
}
