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

    public function getTrancheIndication(): Ubki\Dictionaries\Flag
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

    public function associativeAttributes(): array
    {
        return [
            Ubki\Data\Interfaces\DealLife::ID => $this->getId(),
            Ubki\Data\Interfaces\DealLife::ISSUE_DATE => $this->getIssueDate(),
            Ubki\Data\Interfaces\DealLife::STATUS => $this->getStatus(),
            Ubki\Data\Interfaces\DealLife::ACTUAL_END_DATE => $this->getActualEndDate(),
            Ubki\Data\Interfaces\DealLife::CURRENT_DEBT => $this->getCurrentDebt(),
            Ubki\Data\Interfaces\DealLife::DELAY_INDICATION => $this->getDelayIndication(),
            Ubki\Data\Interfaces\DealLife::END_DATE => $this->getEndDate(),
            Ubki\Data\Interfaces\DealLife::LIMIT => $this->getLimit(),
            Ubki\Data\Interfaces\DealLife::MANDATORY_PAYMENT => $this->getMandatoryPayment(),
            Ubki\Data\Interfaces\DealLife::OVERDUE_TIME => $this->getOverdueTime(),
            Ubki\Data\Interfaces\DealLife::CURRENT_OVERDUE_DEBT => $this->getCurrentOverdueDebt(),
            Ubki\Data\Interfaces\DealLife::PAYMENT_DATE => $this->getPaymentDate(),
            Ubki\Data\Interfaces\DealLife::PAYMENT_INDICATION => $this->getPaymentIndication(),
            Ubki\Data\Interfaces\DealLife::PERIOD_MONTH => $this->getPeriodMonth(),
            Ubki\Data\Interfaces\DealLife::PERIOD_YEAR => $this->getPeriodYear(),
            Ubki\Data\Interfaces\DealLife::TRANCHE_INDICATION => $this->getTrancheIndication(),
        ];
    }

    protected function validateActualEndDate(?string $actualEndDate, Ubki\Dictionaries\DealStatus $status): void
    {
        if (is_null($actualEndDate) && $status->equals(Ubki\Dictionaries\DealStatus::CLOSE())) {
            throw new \InvalidArgumentException("'Actual end date' must be set if deal status is CLOSE");
        }
    }
}
