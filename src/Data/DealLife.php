<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class DealLife
 * @package Wearesho\Bobra\Ubki\Data
 *
 * @method static DealLife make(...$arguments)
 */
class DealLife implements Ubki\Contract\Data\DealLife, \JsonSerializable
{
    use Makeable, Tagable;

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

    /** @var Ubki\Dictionary\DealStatus */
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

    /** @var Ubki\Dictionary\Flag */
    protected $paymentIndication;

    /** @var Ubki\Dictionary\Flag */
    protected $delayIndication;

    /** @var Ubki\Dictionary\Flag */
    protected $trancheIndication;

    /** @var \DateTimeInterface */
    protected $paymentDate;

    /**
     * This parameter is required if deal is closed
     *
     * @var \DateTimeInterface|null
     */
    protected $actualEndDate;

    public function __construct(
        string $id,
        int $periodMonth,
        int $periodYear,
        \DateTimeInterface $issueDate,
        \DateTimeInterface $endDate,
        Ubki\Dictionary\DealStatus $status,
        float $limit,
        float $mandatoryPayment,
        float $currentDebt,
        float $currentOverdueDebt,
        int $overdueTime,
        Ubki\Dictionary\Flag $paymentIndication,
        Ubki\Dictionary\Flag $delayIndication,
        Ubki\Dictionary\Flag $trancheIndication,
        \DateTimeInterface $paymentDate,
        \DateTimeInterface $actualEndDate = \null
    ) {
        Ubki\Validator::MONTH()->validate((string)$periodMonth);
        Ubki\Validator::YEAR()->validate((string)$periodYear);
        Ubki\Validator::BIG_FLOAT()->validate((string)$limit);
        Ubki\Validator::BIG_FLOAT()->validate((string)$mandatoryPayment);
        Ubki\Validator::BIG_FLOAT()->validate((string)$currentDebt);
        Ubki\Validator::BIG_FLOAT()->validate((string)$currentOverdueDebt);
        Ubki\Validator::SHORT_NUMBER()->validate((string)$overdueTime);

        if ($currentOverdueDebt == 0 && $overdueTime != 0
            || $currentOverdueDebt != 0 && $overdueTime == 0
        ) {
            throw new Ubki\Exception\Overdue($id);
        }

        $this->id = $id;
        $this->periodMonth = $periodMonth;
        $this->periodYear = $periodYear;
        $this->issueDate = $issueDate;
        $this->endDate = $endDate;
        $this->status = $status;
        $this->limit = $limit;
        $this->mandatoryPayment = $mandatoryPayment;
        $this->currentDebt = $currentDebt;
        $this->currentOverdueDebt = $currentOverdueDebt;
        $this->overdueTime = $overdueTime;
        $this->paymentIndication = $paymentIndication;
        $this->delayIndication = $delayIndication;
        $this->trancheIndication = $trancheIndication;
        $this->paymentDate = $paymentDate;

        $this->validateActualEndDate($actualEndDate, $status);

        $this->actualEndDate = $actualEndDate;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'period' => [
                'month' => $this->periodMonth,
                'year' => $this->periodYear,
            ],
            'issueDate' => Carbon::make($this->issueDate),
            'endDate' => Carbon::make($this->endDate),
            'status' => $this->status,
            'limit' => $this->limit,
            'mandatoryPayment' => $this->mandatoryPayment,
            'currentDebt' => $this->currentDebt,
            'currentOverdueDebt' => $this->currentOverdueDebt,
            'overdueTime' => $this->overdueTime,
            'paymentIndication' => $this->paymentIndication,
            'delayIndication' => $this->delayIndication,
            'trancheIndication' => $this->trancheIndication,
            'paymentDate' => Carbon::make($this->paymentDate),
            'actualEndDate' => Carbon::make($this->actualEndDate),
        ];
    }

    public static function tag(): string
    {
        return 'deallife';
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

    public function getStatus(): Ubki\Dictionary\DealStatus
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

    public function getPaymentIndication(): Ubki\Dictionary\Flag
    {
        return $this->paymentIndication;
    }

    public function getDelayIndication(): Ubki\Dictionary\Flag
    {
        return $this->delayIndication;
    }

    public function getTrancheIndication(): Ubki\Dictionary\Flag
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

    protected function validateActualEndDate(
        ?\DateTimeInterface $actualEndDate,
        Ubki\Dictionary\DealStatus $status
    ): void {
        if ($actualEndDate === \null && $status->equals(Ubki\Dictionary\DealStatus::CLOSE())) {
            throw new \InvalidArgumentException("'Actual end date' must be set if deal status is CLOSE");
        }
    }
}
