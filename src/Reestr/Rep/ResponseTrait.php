<?php

namespace Wearesho\Bobra\Ubki\Reestr\Rep;

/**
 * Trait ResponseTrait
 *
 * @package Wearesho\Bobra\Ubki\Reestr\Rep
 */
trait ResponseTrait
{
    /** @var string */
    protected $ertype;

    /** @var string */
    protected $crytical;

    /** @var int */
    protected $inn;

    /** @var string */
    protected $remark;

    /**
     * @inheritdoc
     */
    public function getErtype(): string
    {
        return $this->ertype;
    }

    /**
     * @inheritdoc
     */
    public function getCrytical(): string
    {
        return $this->crytical;
    }

    /**
     * @inheritdoc
     */
    public function getInn(): int
    {
        return $this->inn;
    }

    /**
     * @inheritdoc
     */
    public function getRemark(): string
    {
        return $this->remark;
    }
}
