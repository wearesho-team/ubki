<?php

namespace Wearesho\Bobra\Ubki\Push\Registry;

use Carbon\Carbon;

/**
 * Trait RequestTrait
 *
 * @package Wearesho\Bobra\Ubki\Push\Registry
 */
trait RequestTrait
{
    /** @var string */
    protected $todo;

    /** @var string */
    protected $indate;

    /** @var string */
    protected $idout;

    /** @var string */
    protected $idalien;

    /**
     * @inheritdoc
     */
    public function getRegistryType(): string
    {
        return $this->todo;
    }

    /**
     * @inheritdoc
     */
    public function getOperationDate(): string
    {
        return $this->indate;
    }

    /**
     * @inheritdoc
     */
    public function getUbkiId(): string
    {
        return $this->idout;
    }

    /**
     * @inheritdoc
     */
    public function getPartnerId(): string
    {
        return $this->idalien;
    }

    protected function validateIndate(string $indate): void
    {
        if (!Carbon::hasFormat($indate, 'Ymd')) {
            throw new InvalidOperationDateFormatException($indate);
        }
    }
}
